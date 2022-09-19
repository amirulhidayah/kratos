<?php

namespace App\Http\Controllers\masterData;

use App\Exports\JumlahPendudukExport;
use App\Exports\PendudukExport;
use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Penduduk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Penduduk::with(['desa'])->orderBy('created_at', 'desc')->where(function ($query) use ($request) {
                if ($request->desa_id && $request->desa_id != "semua") {
                    $query->where('desa_id', $request->desa_id);
                }
            })->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('desa', function ($row) {
                    return $row->desa->nama;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '';

                    $actionBtn .= '<button class="btn btn-success btn-rounded btn-sm mr-1" id="btn-lihat" value="' . $row->id . '"><i class="far fa-eye"></i></button>';

                    if (Auth::user()->role == "Admin") {
                        $actionBtn .= '<a id="btn-edit" class="btn btn-warning btn-rounded btn-sm mr-1" href="' . url('master-data/penduduk/' . $row->id . '/edit')  . '" ><i class="fas fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-rounded btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i></button>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $daftarDesa = Desa::orderBy('nama', 'asc')->get();
        $daftarJumlahPenduduk = $this->_getJumlahPenduduk();

        return view('dashboard.pages.masterData.penduduk.index', compact(['daftarJumlahPenduduk', 'daftarDesa']));
    }

    private function _getJumlahPenduduk()
    {
        // * 0-24 bulan baduta (bayi dua tahun)
        // * 24-60 Bulan balita (bayi lima tahun)
        // * 5-12 tahun anak
        // * 12-18 tahun remaja
        // * > 18 dewasa
        // * > 60 lansia

        $daftarDesa = Desa::orderBy('nama', 'asc')->get();
        $arrayDesa = [];

        foreach ($daftarDesa as $desa) {
            $pendudukLaki = Penduduk::where('desa_id', $desa->id)->where('jenis_kelamin', 'Laki-Laki')->count();
            $pendudukPerempuan = Penduduk::where('desa_id', $desa->id)->where('jenis_kelamin', 'Perempuan')->count();
            $totalPenduduk = $pendudukLaki + $pendudukPerempuan;

            // Pendidikan
            $tidakSekolah = Penduduk::where('desa_id', $desa->id)->where(function ($query) {
                $query->where('status_pendidikan', 'Tidak Sekolah');
                $query->orWhere('status_pendidikan', null);
            })->count();
            $sd = Penduduk::where('desa_id', $desa->id)->where('status_pendidikan', 'SD')->count();
            $smp = Penduduk::where('desa_id', $desa->id)->where('status_pendidikan', 'SMP')->count();
            $sma = Penduduk::where('desa_id', $desa->id)->where('status_pendidikan', 'SMA')->count();
            $diploma1 = Penduduk::where('desa_id', $desa->id)->where('status_pendidikan', 'Diploma 1')->count();
            $diploma2 = Penduduk::where('desa_id', $desa->id)->where('status_pendidikan', 'Diploma 2')->count();
            $diploma3 = Penduduk::where('desa_id', $desa->id)->where('status_pendidikan', 'Diploma 3')->count();
            $s1 = Penduduk::where('desa_id', $desa->id)->where('status_pendidikan', 'S1 / Diploma 4')->count();
            $s2 = Penduduk::where('desa_id', $desa->id)->where('status_pendidikan', 'S2')->count();
            $s3 = Penduduk::where('desa_id', $desa->id)->where('status_pendidikan', 'S3')->count();

            // Pekerjaan
            $tidakBekerja = Penduduk::where('desa_id', $desa->id)->where(function ($query) {
                $query->where('pekerjaan', 'Tidak Bekerja');
                $query->orWhere('pekerjaan', null);
            })->count();
            $irt = Penduduk::where('desa_id', $desa->id)->where('pekerjaan', 'Ibu Rumah Tangga')->count();
            $karyawanSwasta = Penduduk::where('desa_id', $desa->id)->where('pekerjaan', 'Karyawan Swasta')->count();
            $pns = Penduduk::where('desa_id', $desa->id)->where('pekerjaan', 'PNS / TNI-POLRI')->count();
            $wiraswasta = Penduduk::where('desa_id', $desa->id)->where('pekerjaan', 'Wiraswasta / Wirausaha')->count();
            $petani = Penduduk::where('desa_id', $desa->id)->where('pekerjaan', 'Petani / Pekebun')->count();
            $tidakTetap = Penduduk::where('desa_id', $desa->id)->where('pekerjaan', 'Pekerjaan Tidak Tetap')->count();
            $pelajar = Penduduk::where('desa_id', $desa->id)->where('pekerjaan', 'Pelajar / Mahasiswa')->count();

            // Umur
            $baduta = Penduduk::where(DB::raw('TIMESTAMPDIFF(YEAR,tanggal_lahir,CURDATE())'), '>=', 0)
                ->where(DB::raw('TIMESTAMPDIFF(YEAR,tanggal_lahir,CURDATE())'), '<=', 2)
                ->where('desa_id', $desa->id)
                ->count();
            $balita = Penduduk::where(DB::raw('TIMESTAMPDIFF(YEAR,tanggal_lahir,CURDATE())'), '>', 2)
                ->where(DB::raw('TIMESTAMPDIFF(YEAR,tanggal_lahir,CURDATE())'), '<=', 5)
                ->where('desa_id', $desa->id)
                ->count();
            $anak = Penduduk::where(DB::raw('TIMESTAMPDIFF(YEAR,tanggal_lahir,CURDATE())'), '>', 5)
                ->where(DB::raw('TIMESTAMPDIFF(YEAR,tanggal_lahir,CURDATE())'), '<=', 12)
                ->where('desa_id', $desa->id)
                ->count();
            $remaja = Penduduk::where(DB::raw('TIMESTAMPDIFF(YEAR,tanggal_lahir,CURDATE())'), '>', 12)
                ->where(DB::raw('TIMESTAMPDIFF(YEAR,tanggal_lahir,CURDATE())'), '<=', 18)
                ->where('desa_id', $desa->id)
                ->count();
            $dewasa = Penduduk::where(DB::raw('TIMESTAMPDIFF(YEAR,tanggal_lahir,CURDATE())'), '>', 18)
                ->where(DB::raw('TIMESTAMPDIFF(YEAR,tanggal_lahir,CURDATE())'), '<=', 60)
                ->where('desa_id', $desa->id)
                ->count();
            $lansia = Penduduk::where(DB::raw('TIMESTAMPDIFF(YEAR,tanggal_lahir,CURDATE())'), '>', 60)
                ->where('desa_id', $desa->id)
                ->count();

            $arrayDesa[] = [
                'desa' => $desa->nama,
                'penduduk_laki_laki' => $pendudukLaki,
                'penduduk_perempuan' => $pendudukPerempuan,
                'total_penduduk' => $totalPenduduk,
                'tidak_sekolah' => $tidakSekolah,
                'sd' => $sd,
                'smp' => $smp,
                'sma' => $sma,
                'diploma_1' => $diploma1,
                'diploma_2' => $diploma2,
                'diploma_3' => $diploma3,
                's1' => $s1,
                's2' => $s2,
                's3' => $s3,
                'tidak_bekerja' => $tidakBekerja,
                'irt' => $irt,
                'karyawan_swasta' => $karyawanSwasta,
                'pns' => $pns,
                'wiraswasta' => $wiraswasta,
                'petani' => $petani,
                'pekerjaan_tidak_tetap' => $tidakTetap,
                'pelajar' => $pelajar,
                'baduta' => $baduta,
                'balita' => $balita,
                'anak' => $anak,
                'remaja' => $remaja,
                'dewasa' => $dewasa,
                'lansia' => $lansia
            ];
        }

        return $arrayDesa;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftarDesa = Desa::orderBy('nama', 'asc')->get();
        return view('dashboard.pages.masterData.penduduk.create', compact(['daftarDesa']));
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
                'nik' => ['required', Rule::unique('penduduk')->withoutTrashed(), 'digits:16'],
                'jenis_kelamin' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|date',
                'agama' => 'required',
                'status_pendidikan' => 'required',
                'pekerjaan' => 'required',
                'golongan_darah' => 'required',
                'status_perkawinan' => 'required',
                'tanggal_perkawinan' => $request->status_perkawinan == 'Belum Kawin' ? 'nullable' : 'required|date',
                'kewarganegaraan' => 'required',
                'no_paspor' => 'required',
                'no_kitap' => 'required',
                'alamat' => 'required',
                'desa_id' => 'required'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'nik.required' => 'NIK tidak boleh kosong',
                'nik.unique' => 'NIK sudah ada',
                'nik.digits' => 'NIK harus terdiri dari 16 digit',
                'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong',
                'tempat_lahir.required' => 'Tempat lahir tidak boleh kosong',
                'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong',
                'tanggal_lahir.date' => 'Format tanggal lahir harus benar',
                'agama.required' => 'Agama tidak boleh kosong',
                'pekerjaan.required' => 'Pekerjaan tidak boleh kosong',
                'status_pendidikan.required' => 'Status pendidikan tidak boleh kosong',
                'golongan_darah.required' => 'Golongan darah tidak boleh kosong',
                'status_perkawinan.required' => 'Status perkawinan tidak boleh kosong',
                'tanggal_perkawinan.required' => 'Tanggal perkawinan tidak boleh kosong',
                'tanggal_perkawinan.date' => 'Format tanggal perkawinan harus benar',
                'kewarganegaraan.required' => 'Kewarganegaraan tidak boleh kosong',
                'no_paspor.required' => 'Nomor paspor tidak boleh kosong',
                'no_kitap.required' => 'Nomor KITAP tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'desa_id.required' => 'Desa tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $penduduk = new Penduduk();
        $penduduk->nama = $request->nama;
        $penduduk->nik = $request->nik;
        $penduduk->jenis_kelamin = $request->jenis_kelamin;
        $penduduk->tempat_lahir = $request->tempat_lahir;
        $penduduk->tanggal_lahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
        $penduduk->agama = $request->agama;
        $penduduk->pekerjaan = $request->pekerjaan;
        $penduduk->status_pendidikan = $request->status_pendidikan;
        $penduduk->golongan_darah = $request->golongan_darah;
        $penduduk->status_perkawinan = $request->status_perkawinan;
        $penduduk->tanggal_perkawinan = $request->status_perkawinan == 'Belum Kawin' ? null : Carbon::parse($request->tanggal_perkawinan)->format('Y-m-d');
        $penduduk->kewarganegaraan = $request->kewarganegaraan;
        $penduduk->no_paspor = $request->no_paspor;
        $penduduk->no_kitap = $request->no_kitap;
        $penduduk->alamat = $request->alamat;
        $penduduk->desa_id = $request->desa_id;
        $penduduk->save();


        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Penduduk $penduduk)
    {
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $penduduk)
    {
        $data = [
            'id' => $penduduk->id,
            'nama' => $penduduk->nama,
            'nik' => $penduduk->nik,
            'jenis_kelamin' => $penduduk->jenis_kelamin,
            'tempat_lahir' => $penduduk->tempat_lahir,
            'tanggal_lahir' => Carbon::parse($penduduk->tanggal_lahir)->format('d-m-Y'),
            'agama' => $penduduk->agama,
            'status_pendidikan' => $penduduk->status_pendidikan,
            'pekerjaan' => $penduduk->pekerjaan,
            'golongan_darah' => $penduduk->golongan_darah,
            'status_perkawinan' => $penduduk->status_perkawinan,
            'tanggal_perkawinan' => $penduduk->tanggal_perkawinan ? Carbon::parse($penduduk->tanggal_perkawinan)->format('d-m-Y') : null,
            'kewarganegaraan' => $penduduk->kewarganegaraan,
            'no_paspor' => $penduduk->no_paspor,
            'no_kitap' => $penduduk->no_kitap,
            'alamat' => $penduduk->alamat,
            'desa_id' => $penduduk->desa_id
        ];

        $id = $penduduk->desa_id;
        $daftarDesa = Desa::orderBy('nama', 'asc')->get();

        if ($id) {
            $desaHapus = Desa::where('id', $id)->withTrashed()->first();
            if ($desaHapus->trashed()) {
                $daftarDesa->push($desaHapus);
            }
        }

        return view('dashboard.pages.masterData.penduduk.edit', compact(['daftarDesa', 'data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'nik' => ['required', Rule::unique('penduduk')->ignore($penduduk->id)->withoutTrashed(), 'digits:16'],
                'jenis_kelamin' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|date',
                'agama' => 'required',
                'status_pendidikan' => 'required',
                'pekerjaan' => 'required',
                'golongan_darah' => 'required',
                'status_perkawinan' => 'required',
                'tanggal_perkawinan' => $request->status_perkawinan == 'Belum Kawin' ? 'nullable' : 'required|date',
                'kewarganegaraan' => 'required',
                'no_paspor' => 'required',
                'no_kitap' => 'required',
                'alamat' => 'required',
                'desa_id' => 'required'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'nik.required' => 'NIK tidak boleh kosong',
                'nik.unique' => 'NIK sudah ada',
                'nik.digits' => 'NIK harus terdiri dari 16 digit',
                'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong',
                'tempat_lahir.required' => 'Tempat lahir tidak boleh kosong',
                'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong',
                'tanggal_lahir.date' => 'Format tanggal lahir harus benar',
                'agama.required' => 'Agama tidak boleh kosong',
                'pekerjaan.required' => 'Pekerjaan tidak boleh kosong',
                'status_pendidikan.required' => 'Status pendidikan tidak boleh kosong',
                'golongan_darah.required' => 'Golongan darah tidak boleh kosong',
                'status_perkawinan.required' => 'Status perkawinan tidak boleh kosong',
                'tanggal_perkawinan.required' => 'Tanggal perkawinan tidak boleh kosong',
                'tanggal_perkawinan.date' => 'Format tanggal perkawinan harus benar',
                'kewarganegaraan.required' => 'Kewarganegaraan tidak boleh kosong',
                'no_paspor.required' => 'Nomor paspor tidak boleh kosong',
                'no_kitap.required' => 'Nomor KITAP tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'desa_id.required' => 'Desa tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $penduduk->nama = $request->nama;
        $penduduk->nik = $request->nik;
        $penduduk->jenis_kelamin = $request->jenis_kelamin;
        $penduduk->tempat_lahir = $request->tempat_lahir;
        $penduduk->tanggal_lahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
        $penduduk->agama = $request->agama;
        $penduduk->pekerjaan = $request->pekerjaan;
        $penduduk->status_pendidikan = $request->status_pendidikan;
        $penduduk->golongan_darah = $request->golongan_darah;
        $penduduk->status_perkawinan = $request->status_perkawinan;
        $penduduk->tanggal_perkawinan = $request->status_perkawinan == 'Belum Kawin' ? null : Carbon::parse($request->tanggal_perkawinan)->format('Y-m-d');
        $penduduk->kewarganegaraan = $request->kewarganegaraan;
        $penduduk->no_paspor = $request->no_paspor;
        $penduduk->no_kitap = $request->no_kitap;
        $penduduk->alamat = $request->alamat;
        $penduduk->desa_id = $request->desa_id;
        $penduduk->save();


        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();

        return response()->json(['status' => 'success']);
    }

    public function export(Request $request)
    {
        $desa_id = $request->desa_id;

        $daftarPenduduk = Penduduk::with(['desa'])->where(function ($query) use ($desa_id) {
            if ($desa_id && $desa_id != "semua") {
                $query->where('desa_id', $desa_id);
            }
        })->get();

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new PendudukExport($daftarPenduduk), "Export Data Penduduk" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    public function exportJumlah()
    {
        $daftarJumlahPenduduk = $this->_getJumlahPenduduk();
        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new JumlahPendudukExport($daftarJumlahPenduduk), "Export Data Jumlah Penduduk" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }
}
