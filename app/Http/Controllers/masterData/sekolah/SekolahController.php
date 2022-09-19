<?php

namespace App\Http\Controllers\masterData\sekolah;

use App\Exports\SekolahExport;
use App\Http\Controllers\Controller;
use App\Models\Desa;
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

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jenjang = $request->jenjangSekolah;
        if (!in_array($jenjang, ['sd', 'smp', 'sma-smk'])) {
            return redirect()->back();
        }

        if ($request->ajax()) {
            $data = Sekolah::orderBy('created_at', 'desc')->where(function ($query) use ($jenjang) {
                if ($jenjang == 'sd') {
                    $query->where('jenjang', 'SD');
                } else if ($jenjang == 'smp') {
                    $query->where('jenjang', 'SMP');
                } else {
                    $query->where('jenjang', 'SMA / SMK');
                }
            })->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('desa', function ($row) {
                    return $row->desa->nama;
                })
                ->addColumn('action', function ($row) use ($jenjang) {
                    $actionBtn = '';

                    $actionBtn = '<a class="btn btn-success btn-rounded btn-sm mr-1" id="btn-lihat" href="' . url('master-data/siswa' . '/' . $row->id)  . '"><i class="far fa-eye"></i></a>';

                    if (Auth::user()->role == "Admin") {
                        $actionBtn .= '<a id="btn-edit" class="btn btn-warning btn-rounded btn-sm mr-1" href="' . url('master-data/sekolah/' . $jenjang . '/' . $row->id . '/edit')  . '" ><i class="fas fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-rounded btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i></button>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $jumlahData = $this->_getJumlahData($jenjang);
        return view('dashboard.pages.masterData.sekolah.sekolah.index', compact(['jenjang', 'jumlahData']));
    }

    private function _getJumlahData($jenjang)
    {
        $daftarSekolah = Sekolah::orderBy('created_at', 'desc')->where(function ($query) use ($jenjang) {
            if ($jenjang == 'sd') {
                $query->where('jenjang', 'SD');
            } else if ($jenjang == 'smp') {
                $query->where('jenjang', 'SMP');
            } else {
                $query->where('jenjang', 'SMA / SMK');
            }
        })->get();

        foreach ($daftarSekolah as $sekolah) {
            $siswaLaki = Siswa::with(['sekolah', 'penduduk'])
                ->whereHas('penduduk', function ($query) {
                    $query->where('jenis_kelamin', 'Laki-Laki');
                })
                ->where('sekolah_id', $sekolah->id)
                ->count();

            $siswaPerempuan = Siswa::with(['sekolah', 'penduduk'])
                ->whereHas('penduduk', function ($query) {
                    $query->where('jenis_kelamin', 'Perempuan');
                })
                ->where('sekolah_id', $sekolah->id)
                ->count();

            $arrayJumlah[] = [
                'sekolah' => $sekolah->nama,
                'jenis' => $sekolah->jenis,
                'desa' => $sekolah->desa->nama,
                'siswa_laki' => $siswaLaki,
                'siswa_perempuan' => $siswaPerempuan,
                'total_siswa' => ($siswaLaki + $siswaPerempuan)
            ];
        }

        return $arrayJumlah;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $jenjang = $request->jenjangSekolah;
        if (!in_array($jenjang, ['sd', 'smp', 'sma-smk'])) {
            return redirect()->back();
        }

        $daftarDesa = Desa::orderBy('nama', 'asc')->get();
        return view('dashboard.pages.masterData.sekolah.sekolah.create', compact(['daftarDesa', 'jenjang']));
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
                'jenis' => 'required',
                'desa_id' => 'required',
            ],
            [
                'nama.required' => 'Nama sekolah tidak boleh kosong',
                'jenis.required' => 'Jenis sekolah tidak boleh kosong',
                'desa_id.required' => 'Desa tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $sekolah = new Sekolah();
        $sekolah->nama = $request->nama;
        $sekolah->jenis = $request->jenis;
        $sekolah->jenjang = $request->jenjang;
        $sekolah->desa_id = $request->desa_id;
        $sekolah->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show(Sekolah $sekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $jenjang = $request->jenjangSekolah;
        if (!in_array($jenjang, ['sd', 'smp', 'sma-smk'])) {
            return redirect()->back();
        }

        $sekolah = Sekolah::find($request->sekolah);

        $id = $sekolah->desa_id;
        $daftarDesa = Desa::orderBy('nama', 'asc')->get();

        if ($id) {
            $desaHapus = Desa::where('id', $id)->withTrashed()->first();
            if ($desaHapus->trashed()) {
                $daftarDesa->push($desaHapus);
            }
        }
        return view('dashboard.pages.masterData.sekolah.sekolah.edit', compact(['daftarDesa', 'jenjang', 'sekolah']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'jenis' => 'required',
                'desa_id' => 'required',
            ],
            [
                'nama.required' => 'Nama sekolah tidak boleh kosong',
                'jenis.required' => 'Jenis sekolah tidak boleh kosong',
                'desa_id.required' => 'Desa tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $sekolah = Sekolah::find($request->sekolah);
        $sekolah->nama = $request->nama;
        $sekolah->jenis = $request->jenis;
        $sekolah->jenjang = $request->jenjang;
        $sekolah->desa_id = $request->desa_id;
        $sekolah->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $sekolah = Sekolah::find($request->sekolah);
        $sekolah->delete();

        $siswa = Siswa::where('sekolah_id', $sekolah->id)->delete();

        return response()->json(['status' => 'success']);
    }

    public function export(Request $request)
    {
        $jenjang = $request->jenjangSekolah;
        $daftarJumlahData = $this->_getJumlahData($jenjang);
        // dd($daftarJumlahData);

        if ($jenjang == 'sd') {
            $jenjang = 'SD';
        } else if ($jenjang == 'smp') {
            $jenjang = 'SMP';
        } else {
            $jenjang = 'SMA / SMK';
        }

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new SekolahExport($daftarJumlahData, $jenjang), "Export Data Jumlah Data Sekolah " . $jenjang . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }
}
