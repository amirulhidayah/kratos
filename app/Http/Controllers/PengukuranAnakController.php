<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Kecamatan;
use App\Models\Penduduk;
use App\Models\PengukuranAnak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class PengukuranAnakController extends Controller
{
    public function __construct(Request $request)
    {
        $anak = Anak::find($request->anak);
        if ($anak == null) {
            return redirect(url('daftar-pengukuran-anak'))->send();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $anak = Anak::find($request->anak);
        $data = PengukuranAnak::where('anak_id', $anak->id)->orderBy('created_at', 'desc')->get();
        if ($request->ajax()) {
            $data = PengukuranAnak::where('anak_id', $anak->id)->orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('puskesmas', function ($row) {
                    return $row->puskesmas->nama ?? '-';
                })
                ->addColumn('posyandu', function ($row) {
                    return $row->posyandu->nama ?? '-';
                })
                ->addColumn('tanggal_pengukuran', function ($row) {
                    $tanggalLahir = Carbon::parse($row->anak->tanggal_lahir);
                    $tanggalPengukuran = Carbon::parse($row->tanggal_pengukuran);

                    $tanggal = '<p class="mt-2 mb-0">' .  $tanggalPengukuran->translatedFormat('d F Y') . '</p>';

                    if ($tanggalLahir->gt($tanggalPengukuran)) {
                        $tanggal .= '<p class="blink-soft"><span class="badge badge-danger">Tanggal Pengukuran Kurang Dari Tanggal Lahir</span></p>';
                    }

                    return $tanggal;
                })
                ->addColumn('usia_sebut', function ($row) {
                    $tanggalLahir = Carbon::parse($row->anak->tanggal_lahir)->format('Y-m-d');
                    $tanggalUkur = Carbon::parse($row->tanggal_pengukuran)->format('Y-m-d');
                    return usiaSebut($tanggalLahir, $tanggalUkur);
                })
                ->addColumn('berat', function ($row) {

                    return $row->berat . ' Kg';
                })
                ->addColumn('tinggi', function ($row) {

                    return $row->tinggi . ' Cm';
                })
                ->addColumn('lila', function ($row) {

                    return $row->lila;
                })
                ->addColumn('bb_u', function ($row) {

                    return $row->bb_u;
                })
                ->addColumn('tb_u', function ($row) {

                    return $row->tb_u;
                })
                ->addColumn('bb_tb', function ($row) {

                    return $row->bb_tb;
                })
                ->addColumn('action', function ($row) use ($anak) {
                    $actionBtn = '';

                    if (Auth::user()->role == "Admin") {

                        $actionBtn .= '<a id="btn-edit" class="btn btn-warning btn-rounded btn-sm mr-1 my-1" href="' . url('pengukuran-anak/' . $anak->id . '/' . $row->id . '/edit')  . '" ><i class="fas fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-rounded btn-sm mr-1 my-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i></button>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action', 'orang_tua', 'tanggal_pengukuran', 'usia_sebut', 'berat', 'tinggi', 'lila', 'bb_u', 'tb_u', 'bb_tb'])
                ->make(true);
        }

        $daftarKecamatan = Kecamatan::orderBy('nama', 'asc')->get();
        // $daftarJumlahPenduduk = $this->_getJumlahPenduduk();

        return view('dashboard.pages.pengukuranAnak.index', compact(['daftarKecamatan', 'anak']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $anak = Anak::find($request->anak);
        return view('dashboard.pages.pengukuranAnak.create', compact(['anak']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anak = Anak::find($request->anak);
        $validator = Validator::make(
            $request->all(),
            [
                'tanggal_pengukuran' => 'required|date',
                'lila' => $request->lila ? 'required|numeric|min:0' : 'nullable',
                'bb' => 'required|numeric|min:0',
                'tb' => 'required|numeric|min:0',
                'puskesmas_id' => 'required',
                'posyandu_id' => 'nullable'
            ],
            [
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

        $tanggalLahir = Carbon::parse($anak->tanggal_lahir)->format('Y-m-d');
        $tanggalUkur = Carbon::parse($request->tanggal_pengukuran)->format('Y-m-d');
        $usiaBulan = usiaBulan($tanggalLahir, $tanggalUkur);
        $usiaSebut = usiaSebut($tanggalLahir, $tanggalUkur);
        $bbu = bbu($usiaBulan, $anak->jenis_kelamin, $request->bb);
        $tbu = tbu($usiaBulan, $anak->jenis_kelamin, $request->tb);
        $bbtb = bbtb($usiaBulan, $anak->jenis_kelamin, $request->tb, $request->bb);

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

        $pengukuranAnak = new PengukuranAnak();
        $pengukuranAnak->anak_id = $anak->id;
        $pengukuranAnak->berat = $request->bb;
        $pengukuranAnak->tinggi = $request->tb;
        $pengukuranAnak->lila = $request->lila;
        $pengukuranAnak->tanggal_pengukuran = Carbon::parse($request->tanggal_pengukuran)->format('Y-m-d');
        $pengukuranAnak->puskesmas_id = $request->puskesmas_id;
        $pengukuranAnak->posyandu_id = $request->posyandu_id;
        $pengukuranAnak->bb_u = $bbu;
        $pengukuranAnak->tb_u = $tbu;
        $pengukuranAnak->bb_tb = $bbtb;
        $pengukuranAnak->save();


        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengukuranAnak  $pengukuranAnak
     * @return \Illuminate\Http\Response
     */
    public function show(PengukuranAnak $pengukuranAnak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengukuranAnak  $pengukuranAnak
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $anak = Anak::find($request->anak);
        $pengukuranAnak = PengukuranAnak::find($request->pengukuranAnak);

        return view('dashboard.pages.pengukuranAnak.edit', compact(['anak', 'pengukuranAnak']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengukuranAnak  $pengukuranAnak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $anak = Anak::find($request->anak);
        $validator = Validator::make(
            $request->all(),
            [
                'tanggal_pengukuran' => 'required|date',
                'lila' => $request->lila ? 'required|numeric|min:0' : 'nullable',
                'bb' => 'required|numeric|min:0',
                'tb' => 'required|numeric|min:0',
                'puskesmas_id' => 'required',
                'posyandu_id' => 'nullable'
            ],
            [
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

        $tanggalLahir = Carbon::parse($anak->tanggal_lahir)->format('Y-m-d');
        $tanggalUkur = Carbon::parse($request->tanggal_pengukuran)->format('Y-m-d');
        $usiaBulan = usiaBulan($tanggalLahir, $tanggalUkur);
        $usiaSebut = usiaSebut($tanggalLahir, $tanggalUkur);
        $bbu = bbu($usiaBulan, $anak->jenis_kelamin, $request->bb);
        $tbu = tbu($usiaBulan, $anak->jenis_kelamin, $request->tb);
        $bbtb = bbtb($usiaBulan, $anak->jenis_kelamin, $request->tb, $request->bb);

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

        $pengukuranAnak = PengukuranAnak::find($request->pengukuranAnak);
        $pengukuranAnak->anak_id = $anak->id;
        $pengukuranAnak->berat = $request->bb;
        $pengukuranAnak->tinggi = $request->tb;
        $pengukuranAnak->lila = $request->lila;
        $pengukuranAnak->tanggal_pengukuran = Carbon::parse($request->tanggal_pengukuran)->format('Y-m-d');
        $pengukuranAnak->puskesmas_id = $request->puskesmas_id;
        $pengukuranAnak->posyandu_id = $request->posyandu_id;
        $pengukuranAnak->bb_u = $bbu;
        $pengukuranAnak->tb_u = $tbu;
        $pengukuranAnak->bb_tb = $bbtb;
        $pengukuranAnak->save();


        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengukuranAnak  $pengukuranAnak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pengukuranAnak = PengukuranAnak::find($request->pengukuranAnak);
        $pengukuranAnak->delete();

        return response()->json(['status' => 'success']);
    }
}
