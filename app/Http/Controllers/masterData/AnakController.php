<?php

namespace App\Http\Controllers\masterData;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\Kecamatan;
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
            $data = Anak::with(['orangTua'], function ($query) use ($request) {
                $query->with(['desa'])->orderBy('created_at', 'desc')->where(function ($query) use ($request) {
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
            })->get();
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
                        $orangTua .= '<p>Ibu : ' . $row->orangTua->nama_ibu . ' (' . $row->orangTua->nik_ibu . ') </p>';
                    }

                    if ($row->orangTua->nama_ayah) {
                        $orangTua .= '<p>Ayah : ' . $row->orangTua->nama_ayah . ' (' . $row->orangTua->nik_ayah . ') </p>';
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
                        $actionBtn .= '<a id="btn-edit" class="btn btn-warning btn-rounded btn-sm mr-1" href="' . url('master-data/orang-tua/' . $row->id . '/edit')  . '" ><i class="fas fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-rounded btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i></button>';
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
    public function edit(Anak $anak)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anak $anak)
    {
        //
    }
}
