<?php

namespace App\Http\Controllers\masterData;

use App\Exports\AnakExport;
use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\Kecamatan;
use App\Models\PengukuranAnak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class AnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Anak::with(['orangTua'])->where(function ($query) use ($request) {
                if ($request->kecamatan_id && $request->kecamatan_id != "semua") {
                    $query->whereHas('orangTua', function ($query) use ($request) {
                        $query->whereHas('desa', function ($query) use ($request) {
                            $query->where('kecamatan_id', $request->kecamatan_id);
                        });
                    });
                }
                $query->whereHas('orangTua', function ($query) use ($request) {
                    if ($request->desa_id && $request->desa_id != "semua") {
                        $query->where('desa_id', $request->desa_id);
                    }
                });
            })->where(function ($query) use ($request) {
                if ($request->nama_nik) {
                    $query->where('nama', 'LIKE', '%' . $request->nama_nik . '%');
                    $query->orWhere('nik', 'LIKE', '%' . $request->nama_nik . '%');

                    $query->orWhereHas('orangTua', function ($query) use ($request) {
                        $query->where('nama_ibu', 'LIKE', '%' . $request->nama_nik . '%');
                        $query->orWhere('nik_ibu', 'LIKE', '%' . $request->nama_nik . '%');
                        $query->orWhere('nama_ayah', 'LIKE', '%' . $request->nama_nik . '%');
                        $query->orWhere('nik_ayah', 'LIKE', '%' . $request->nama_nik . '%');
                    });
                }
            })->orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tanggal_lahir', function ($row) {
                    return Carbon::parse($row->tanggal_lahir)->translatedFormat('d F Y');
                })
                ->addColumn('kecamatan', function ($row) {
                    return $row->orangTua->desa->kecamatan->nama;
                })
                ->addColumn('desa', function ($row) {
                    return $row->orangTua->desa->nama;
                })
                ->addColumn('orang_tua', function ($row) {
                    $orangTua = '';
                    if ($row->orangTua->nama_ibu) {
                        $orangTua .= '<p class="my-0">Ibu : ' . $row->orangTua->nama_ibu . ' (' . $row->orangTua->nik_ibu . ') </p>';
                    }

                    if ($row->orangTua->nama_ayah) {
                        $orangTua .= '<p class="my-0">Ayah : ' . $row->orangTua->nama_ayah . ' (' . $row->orangTua->nik_ayah . ') </p>';
                    }
                    return $orangTua;
                })
                ->addColumn('alamat', function ($row) {
                    return $row->orangTua->alamat;
                })
                ->addColumn('bb_lahir', function ($row) {
                    return $row->bb_lahir . ' Kg';
                })
                ->addColumn('tb_lahir', function ($row) {
                    return $row->tb_lahir . ' Cm';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '';

                    $actionBtn .= '<button class="btn btn-success btn-rounded btn-sm mr-1" id="btn-lihat" value="' . $row->id . '"><i class="far fa-eye"></i></button>';

                    if (Auth::user()->role == "Admin") {
                        if ($row->pengukuranAnakTerakhir) {
                            $actionBtn .= '<a class="btn btn-secondary btn-rounded btn-sm mr-1 my-1" href="' . url('pengukuran-anak/' . $row->id)  . '" ><i class="fas fa-ruler"></i></a>';
                        } else {
                            $actionBtn .= '<a class="btn btn-secondary btn-rounded btn-sm mr-1 my-1" href="' . url('pengukuran-anak/' . $row->id . '/create')  . '" ><i class="fas fa-ruler"></i></a>';
                        }
                        $actionBtn .= '<a id="btn-edit" class="btn btn-warning btn-rounded btn-sm mr-1" href="' . url('master-data/anak/' . $row->id . '/edit')  . '" ><i class="fas fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-rounded btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i></button>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action', 'orang_tua'])
                ->make(true);
        }

        $daftarKecamatan = Kecamatan::orderBy('nama', 'asc')->get();
        // $daftarJumlahPenduduk = $this->_getJumlahPenduduk();

        return view('dashboard.pages.masterData.anak.index', compact(['daftarKecamatan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.masterData.anak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'nik' => ['required', Rule::unique('anak')->withoutTrashed(), 'digits:16'],
                'jenis_kelamin' => 'required',
                'tanggal_lahir' => 'required|date',
                'orang_tua_id' => 'required',
                'bb_lahir' => $request->bb_lahir ? 'required|numeric|min:0' : 'nullable',
                'tb_lahir' => $request->tb_lahir ? 'required|numeric|min:0' : 'nullable',
                'data_pengukuran' => 'required',
                'tanggal_pengukuran' => $request->data_pengukuran == 'Ya' ? 'required|date' : 'nullable',
                'lila' => $request->data_pengukuran == 'Ya' ? 'required|numeric|min:0' : 'nullable',
                'bb' => $request->data_pengukuran == 'Ya' ? 'required|numeric|min:0' : 'nullable',
                'tb' => $request->data_pengukuran == 'Ya' ? 'required|numeric|min:0' : 'nullable',
                'puskesmas_id' => $request->data_pengukuran == 'Ya' ? 'required' : 'nullable',
                'posyandu_id' => 'nullable'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'data_pengukuran.required' => 'Pilihan data pengukuran tidak boleh kosong',
                'nik.required' => 'NIK tidak boleh kosong',
                'nik.unique' => 'NIK sudah ada',
                'nik.digits' => 'NIK harus terdiri dari 16 digit',
                'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong',
                'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong',
                'tanggal_lahir.date' => 'Format tanggal lahir harus benar',
                'orang_tua_id.required' => 'Orang tua tidak boleh kosong',
                'bb_lahir.required' => 'Berat badan lahir tidak boleh kosong',
                'bb_lahir.numeric' => 'Berat badan lahir harus angka',
                'bb_lahir.min' => 'Berat badan lahir tidak boleh bernilai negatif',
                'tb_lahir.required' => 'Tinggi badan lahir tidak boleh kosong',
                'tb_lahir.numeric' => 'Tinggi badan lahir harus angka',
                'tb_lahir.min' => 'Tinggi badan lahir tidak boleh bernilai negatif',
                'tanggal_pengukuran.required' => 'Tanggal pengukuran tidak boleh kosong',
                'tanggal_pengukuran.date' => 'Format tanggal pengukuran harus benar',
                'bb.required' => 'Berat badan tidak boleh kosong',
                'bb.numeric' => 'Berat badan harus angka',
                'bb.min' => 'Berat badan tidak boleh bernilai negatif',
                'tb.required' => 'Tinggi badan tidak boleh kosong',
                'tb.numeric' => 'Tinggi badan harus angka',
                'tb.min' => 'Lingkar lengan atas tidak boleh bernilai negatif',
                'lila.required' => 'Lingkar lengan atas tidak boleh kosong',
                'lila.numeric' => 'Lingkar lengan atas harus angka',
                'lila.min' => 'Lingkar lengan atas tidak boleh bernilai negatif',
                'puskesmas_id.required' => 'PUSKESMAS tidak boleh kosong'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $tanggalLahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
        $tanggalUkur = Carbon::parse($request->tanggal_pengukuran)->format('Y-m-d');
        $usiaBulan = usiaBulan($tanggalLahir, $tanggalUkur);
        $usiaSebut = usiaSebut($tanggalLahir, $tanggalUkur);
        $bbu = bbu($usiaBulan, $request->jenis_kelamin, $request->bb);
        $tbu = tbu($usiaBulan, $request->jenis_kelamin, $request->tb);
        $bbtb = bbtb($usiaBulan, $request->jenis_kelamin, $request->tb, $request->bb);

        $cekTanggalUkur = Carbon::parse($tanggalUkur)->gt(Carbon::parse($tanggalLahir));

        if (!$cekTanggalUkur) {
            return response()->json(
                [
                    'error' => [
                        'tanggal_pengukuran' => [
                            'Tanggal pengukuran tidak boleh kurang dari tanggal lahir'
                        ]
                    ]
                ]
            );
        }

        $anak = new Anak();
        $anak->nama = $request->nama;
        $anak->nik = $request->nik;
        $anak->jenis_kelamin = $request->jenis_kelamin;
        $anak->tanggal_lahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
        $anak->bb_lahir = $request->bb_lahir;
        $anak->tb_lahir = $request->tb_lahir;
        $anak->orang_tua_id = $request->orang_tua_id;
        $anak->save();

        if ($request->data_pengukuran == 'Ya') {
            $pengukuranAnak = new PengukuranAnak();
            $pengukuranAnak->anak_id = $anak->id;
            $pengukuranAnak->berat = $request->bb;
            $pengukuranAnak->tinggi = $request->tb;
            $pengukuranAnak->lila = $request->lila;
            $pengukuranAnak->tanggal_pengukuran = Carbon::parse($request->tanggal_pengukuran)->format('Y-m-d');
            $pengukuranAnak->puskesmas_id = $request->puskesmas_id;
            $pengukuranAnak->posyandu_id = $request->posyandu_id;
            $pengukuranAnak->usia_saat_ukur = $usiaSebut;
            $pengukuranAnak->bb_u = $bbu;
            $pengukuranAnak->tb_u = $tbu;
            $pengukuranAnak->bb_tb = $bbtb;
            $pengukuranAnak->save();
        }


        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function show(Anak $anak)
    {
        return response()->json([
            'status' => 'success',
            'anak' => $anak,
            'orangTua' => $anak->orangTua,
            'kecamatan' => $anak->orangTua->desa->kecamatan->nama,
            'desa' => $anak->orangTua->desa->nama,
            'pengukuranAnakTerakhir' => $anak->pengukuranAnakTerakhir,
            'tanggalPengukuran' => $anak->pengukuranAnakTerakhir->tanggal_pengukuran ?? '' ? Carbon::parse($anak->pengukuranAnakTerakhir->tanggal_pengukuran)->translatedFormat('d F Y') : '-',
            'tanggalLahir' => $anak->tanggal_lahir ?? '' ? Carbon::parse($anak->tanggal_lahir)->translatedFormat('d F Y') : '-',

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function edit(Anak $anak)
    {
        return view('dashboard.pages.masterData.anak.edit', compact(['anak']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anak $anak)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'nik' => ['required', Rule::unique('anak')->ignore($anak->id)->withoutTrashed(), 'digits:16'],
                'jenis_kelamin' => 'required',
                'tanggal_lahir' => 'required|date',
                'orang_tua_id' => 'required',
                'bb_lahir' => $request->bb_lahir ? 'required|numeric|min:0' : 'nullable',
                'tb_lahir' => $request->tb_lahir ? 'required|numeric|min:0' : 'nullable',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'nik.required' => 'NIK tidak boleh kosong',
                'nik.unique' => 'NIK sudah ada',
                'nik.digits' => 'NIK harus terdiri dari 16 digit',
                'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong',
                'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong',
                'tanggal_lahir.date' => 'Format tanggal lahir harus benar',
                'orang_tua_id.required' => 'Orang tua tidak boleh kosong',
                'bb_lahir.required' => 'Berat badan lahir tidak boleh kosong',
                'bb_lahir.numeric' => 'Berat badan lahir harus angka',
                'bb_lahir.min' => 'Berat badan lahir tidak boleh bernilai negatif',
                'tb_lahir.required' => 'Tinggi badan lahir tidak boleh kosong',
                'tb_lahir.numeric' => 'Tinggi badan lahir harus angka',
                'tb_lahir.min' => 'Tinggi badan lahir tidak boleh bernilai negatif',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $anak->nama = $request->nama;
        $anak->nik = $request->nik;
        $anak->jenis_kelamin = $request->jenis_kelamin;
        $anak->tanggal_lahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
        $anak->bb_lahir = $request->bb_lahir;
        $anak->tb_lahir = $request->tb_lahir;
        $anak->orang_tua_id = $request->orang_tua_id;
        $anak->save();


        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anak $anak)
    {
        $anak->delete();

        return response()->json(['status' => 'success']);
    }

    public function export(Request $request)
    {
        $daftarAnak = Anak::with(['orangTua'])->where(function ($query) use ($request) {
            if ($request->kecamatan_id && $request->kecamatan_id != "semua") {
                $query->whereHas('orangTua', function ($query) use ($request) {
                    $query->whereHas('desa', function ($query) use ($request) {
                        $query->where('kecamatan_id', $request->kecamatan_id);
                    });
                });
            }
            $query->whereHas('orangTua', function ($query) use ($request) {
                if ($request->desa_id && $request->desa_id != "semua") {
                    $query->where('desa_id', $request->desa_id);
                }
            });
        })->orderBy('created_at', 'desc')->get();

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new AnakExport($daftarAnak), "Export Data Anak" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }
}
