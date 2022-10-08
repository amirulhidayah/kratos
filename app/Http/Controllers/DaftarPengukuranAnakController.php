<?php

namespace App\Http\Controllers;

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

class DaftarPengukuranAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Anak::with(['pengukuranAnakTerakhir'])->where(function ($query) use ($request) {
                if ($request->nama_nik) {
                    $query->where('nama', 'LIKE', '%' .  $request->nama_nik . '%');
                    $query->orWhere('nik', 'LIKE', '%' . $request->nama_nik . '%');
                }
            })->orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tanggal_lahir', function ($row) {
                    return Carbon::parse($row->tanggal_lahir)->translatedFormat('d F Y');
                })
                ->addColumn('tanggal_pengukuran', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        return Carbon::parse($row->pengukuranAnakTerakhir->tanggal_pengukuran)->translatedFormat('d F Y');
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('usia_saat_ukur', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        return $row->pengukuranAnakTerakhir->usia_saat_ukur;
                        // return Carbon::parse($row->pengukuranAnakTerakhir->tanggal_pengukuran)->translatedFormat('d F Y');
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('berat', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        return $row->pengukuranAnakTerakhir->berat . ' Kg';
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('tinggi', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        return $row->pengukuranAnakTerakhir->tinggi . ' Cm';
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('lila', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        return $row->pengukuranAnakTerakhir->lila;
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('bb_u', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        return $row->pengukuranAnakTerakhir->bb_u;
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('tb_u', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        return $row->pengukuranAnakTerakhir->tb_u;
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('bb_tb', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        return $row->pengukuranAnakTerakhir->bb_tb;
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '';

                    $actionBtn .= '<button class="btn btn-success btn-rounded btn-sm mr-1 my-1" id="btn-lihat" value="' . $row->id . '"><i class="far fa-eye"></i></button>';

                    if (Auth::user()->role == "Admin") {
                        if ($row->pengukuranAnakTerakhir) {
                            $actionBtn .= '<a class="btn btn-secondary btn-rounded btn-sm mr-1 my-1" href="' . url('pengukuran-anak/' . $row->id)  . '" ><i class="fas fa-ruler"></i></a>';
                        } else {
                            $actionBtn .= '<a class="btn btn-secondary btn-rounded btn-sm mr-1 my-1" href="' . url('pengukuran-anak/' . $row->id . '/create')  . '" ><i class="fas fa-ruler"></i></a>';
                        }
                        $actionBtn .= '<a id="btn-edit" class="btn btn-warning btn-rounded btn-sm mr-1 my-1" href="' . url('master-data/anak/' . $row->id . '/edit')  . '" ><i class="fas fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-rounded btn-sm mr-1 my-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i></button>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action', 'orang_tua', 'tanggal_pengukuran', 'usia_saat_ukur', 'berat', 'tinggi', 'lila', 'bb_u', 'tb_u', 'bb_tb'])
                ->make(true);
        }

        $daftarKecamatan = Kecamatan::orderBy('nama', 'asc')->get();
        // $daftarJumlahPenduduk = $this->_getJumlahPenduduk();

        return view('dashboard.pages.daftarPengukuranAnak.index', compact(['daftarKecamatan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(PengukuranAnak $pengukuranAnak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengukuranAnak  $pengukuranAnak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengukuranAnak $pengukuranAnak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengukuranAnak  $pengukuranAnak
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengukuranAnak $pengukuranAnak)
    {
        //
    }
}
