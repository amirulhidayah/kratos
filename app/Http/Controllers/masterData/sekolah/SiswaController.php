<?php

namespace App\Http\Controllers\masterData\sekolah;

use App\Exports\SiswaExport;
use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Penduduk;
use App\Models\Sekolah;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sekolah = Sekolah::find($request->sekolah);
        if (!$sekolah) {
            return redirect()->back();
        }

        if ($sekolah->jenjang == 'SD') {
            $jenjang = 'sd';
        } else if ($sekolah->jenjang == 'SMP') {
            $jenjang = 'smp';
        } else {
            $jenjang = 'sma-smk';
        }

        if ($request->ajax()) {
            $data = Siswa::orderBy('created_at', 'desc')->where('sekolah_id', $sekolah->id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkData', function ($row) {
                    return $row->id;
                })
                ->addColumn('nama', function ($row) {
                    return $row->penduduk->nama;
                })
                ->addColumn('nik', function ($row) {
                    return $row->penduduk->nik;
                })
                ->addColumn('jenis_kelamin', function ($row) {
                    return $row->penduduk->jenis_kelamin;
                })
                ->addColumn('desa', function ($row) {
                    return $row->penduduk->desa->nama;
                })
                ->addColumn('action', function ($row) use ($sekolah) {
                    $actionBtn = '';

                    $actionBtn .= '<button class="btn btn-success btn-rounded btn-sm mr-1" id="btn-lihat" value="' . $row->penduduk_id . '"><i class="far fa-eye"></i></button>';

                    if (Auth::user()->role == "Admin") {
                        $actionBtn .= '<button id="btn-delete" class="btn btn-danger btn-rounded btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i></button>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.pages.masterData.sekolah.siswa.index', compact(['sekolah', 'jenjang']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sekolah = Sekolah::find($request->sekolah);
        $daftarDesa = Desa::with('penduduk')->get();
        $idSiswa = Siswa::where('sekolah_id', $request->sekolah)->pluck('penduduk_id');
        return view('dashboard.pages.masterData.sekolah.siswa.create', compact(['sekolah', 'daftarDesa', 'idSiswa']));
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
                'penduduk_id' => 'required',
            ],
            [
                'penduduk_id.required' => 'Siswa tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        for ($i = 0; $i < count($request->penduduk_id); $i++) {
            $siswa = new Siswa();
            $siswa->sekolah_id = $request->sekolah;
            $siswa->penduduk_id = $request->penduduk_id[$i];
            $siswa->save();
        }


        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $siswa = Siswa::find($request->siswa)->delete();

        return response()->json(['status' => 'success']);
    }

    public function deleteSelected(Request $request)
    {
        foreach ($request->id as $id) {
            $siswa = Siswa::find($id)->delete();
        }

        return response()->json(['status' => 'success']);
    }

    public function detailSiswa(Request $request)
    {
        $penduduk = Penduduk::find($request->id);
        $data = [
            'nama' => $penduduk->nama,
            'nik' => $penduduk->nik,
            'jenis_kelamin' => $penduduk->jenis_kelamin,
            'ttl' => $penduduk->tempat_lahir . ', ' . Carbon::parse($penduduk->tanggal_lahir)->translatedFormat('d F Y'),
            'agama' => $penduduk->agama,
            'pendidikan' => $penduduk->status_pendidikan ?? 'Tidak Sekolah',
            'pekerjaan' => $penduduk->pekerjaan,
            'golongan_darah' => $penduduk->golongan_darah ?? 'Tidak Tahu',
            'status_perkawinan' => $penduduk->status_perkawinan,
            'tanggal_perkawinan' => $penduduk->tanggal_perkawinan ? Carbon::parse($penduduk->tanggal_perkawinan)->translatedFormat('d F Y') : '-',
            'kewarganegaraan' => $penduduk->kewarganegaraan,
            'no_paspor' => $penduduk->no_paspor ?? '-',
            'no_kitap' => $penduduk->no_kitap ?? '-',
            'alamat' => $penduduk->alamat,
            'desa' => $penduduk->desa->nama
        ];
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function export(Request $request)
    {
        $sekolah = Sekolah::find($request->sekolah);
        if (!$sekolah) {
            return redirect()->back();
        }

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');
        $daftarSiswa = Siswa::orderBy('created_at', 'desc')->where('sekolah_id', $sekolah->id)->get();
        return Excel::download(new SiswaExport($daftarSiswa, $sekolah), "Export Data Siswa " . $sekolah->nama . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }
}
