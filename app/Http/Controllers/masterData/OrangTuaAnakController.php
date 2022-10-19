<?php

namespace App\Http\Controllers\masterData;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\Kecamatan;
use App\Models\OrangTua;
use App\Models\PengukuranAnak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class OrangTuaAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orangTua = OrangTua::where('id', $request->orangTua)->first();
        if ($request->ajax()) {
            $data = Anak::with(['orangTua'], function ($query) use ($request) {
                $query->with(['desa'])->where(function ($query) use ($request) {
                    if ($request->kecamatan_id && $request->kecamatan_id != "semua") {
                        $query->whereHas('desa', function ($query) use ($request) {
                            $query->whereHas('kecamatan', function ($query) use ($request) {
                                $query->where('id', $request->kecamatan_id);
                            });
                        });
                    }

                    if ($request->desa_id && $request->desa_id != "semua") {
                        $query->where('desa_id', $request->desa_id);
                    }
                });
            })->where('orang_tua_id', $orangTua->id)->orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('nama', function ($row) {
                    $nama = '<p class="mt-2 mb-0">' .  $row->nama . '</p>';

                    if (count($row->pengukuranAnakLewatTanggalLahir) > 0) {
                        $nama .= '<p class="blink-soft"><span class="badge badge-danger"> Terdapat Pengukuran yang Tanggal Pengukurannya Kurang Dari Tanggal Lahir</span></p>';
                    }
                    return $nama;
                })
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
                ->addColumn('action', function ($row) {
                    $actionBtn = '';

                    $actionBtn .= '<button class="btn btn-success btn-rounded btn-sm mr-1" id="btn-lihat" value="' . $row->id . '"><i class="far fa-eye"></i></button>';

                    if (Auth::user()->role == "Admin") {
                        if ($row->pengukuranAnakTerakhir) {
                            $actionBtn .= '<a class="btn btn-secondary btn-rounded btn-sm mr-1 my-1" href="' . url('pengukuran-anak/' . $row->id)  . '" ><i class="fas fa-ruler"></i></a>';
                        } else {
                            $actionBtn .= '<a class="btn btn-secondary btn-rounded btn-sm mr-1 my-1" href="' . url('pengukuran-anak/' . $row->id . '/create')  . '" ><i class="fas fa-ruler"></i></a>';
                        }
                        $actionBtn .= '<a id="btn-edit" class="btn btn-warning btn-rounded btn-sm mr-1" href="' . url('master-data/orang-tua/anak/' . $row->orang_tua_id . '/' . $row->id . '/edit')  . '" ><i class="fas fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-rounded btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i></button>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action', 'orang_tua', 'nama'])
                ->make(true);
        }

        $daftarKecamatan = Kecamatan::orderBy('nama', 'asc')->get();

        return view('dashboard.pages.masterData.orangTuaAnak.index', compact(['daftarKecamatan', 'orangTua']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $orangTua = OrangTua::where('id', $request->orangTua)->first();
        return view('dashboard.pages.masterData.orangTuaAnak.create', compact(['orangTua']));
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
                'bb_lahir' => 'required|numeric|min:0',
                'tb_lahir' => 'required|numeric|min:0',
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
        $anak->orang_tua_id = $request->orangTua;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $anak = Anak::where('id', $request->anak)->first();
        $orangTua = OrangTua::where('id', $request->orangTua)->first();
        return view('dashboard.pages.masterData.orangTuaAnak.edit', compact(['anak', 'orangTua']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $anak = Anak::where('id', $request->anak)->first();
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'nik' => ['required', Rule::unique('anak')->ignore($anak->id)->withoutTrashed(), 'digits:16'],
                'jenis_kelamin' => 'required',
                'tanggal_lahir' => 'required|date',
                'bb_lahir' => 'required|numeric|min:0',
                'tb_lahir' => 'required|numeric|min:0'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'nik.required' => 'NIK tidak boleh kosong',
                'nik.unique' => 'NIK sudah ada',
                'nik.digits' => 'NIK harus terdiri dari 16 digit',
                'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong',
                'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong',
                'tanggal_lahir.date' => 'Format tanggal lahir harus benar',
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
        $anak->orang_tua_id = $request->orangTua;
        $anak->save();

        $pengukuranAnak = PengukuranAnak::where('anak_id', $anak->id)->whereDate('tanggal_pengukuran', '<', $anak->tanggal_lahir)->count();
        if ($pengukuranAnak > 0) {
            return response()->json([
                'status' => 'success_pengukuran_lewat_tanggal_lahir',
                'id' => $anak->id
            ]);
        }


        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $anak = Anak::where('id', $request->anak)->first();

        $anak->delete();

        $anak->pengukuranAnak()->delete();

        return response()->json(['status' => 'success']);
    }
}
