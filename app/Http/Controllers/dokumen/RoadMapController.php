<?php

namespace App\Http\Controllers\dokumen;

use App\Http\Controllers\Controller;
use App\Models\RoadMap;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class RoadMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = RoadMap::orderBy('created_at', 'desc')->where(function ($query) use ($request) {
                if ($request->tahun_id && $request->tahun_id != "semua") {
                    $query->where('tahun_id', $request->tahun_id);
                }

                if ($request->search) {
                    $query->where('nama', 'like', '%' . $request->search . '%');
                }
            })->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tahun', function ($row) {
                    return $row->tahun->tahun;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '';

                    $actionBtn .= '<a target="_blank" id="btn-edit" class="btn btn-success btn-rounded btn-sm mr-1" href="' . Storage::url('uploads/dokumen/roadMap/' . $row->file) .  '"><i class="fas fa-file-download"></i></a>';

                    if (Auth::user()->role == "Admin") {
                        $actionBtn .= '<a id="btn-edit" class="btn btn-warning btn-rounded btn-sm mr-1" href="' . url('dokumen/road-map/' . $row->id . '/edit') . '"><i class="fas fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-rounded btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i></button>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $daftarTahun = Tahun::orderBy('tahun', 'asc')->get();
        return view('dashboard.pages.dokumen.roadMap.index', compact(['daftarTahun']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftarTahun = Tahun::orderBy('tahun', 'asc')->get();
        return view('dashboard.pages.dokumen.roadMap.create', compact(['daftarTahun']));
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
                'tahun_id' => 'required',
                'file' => 'required|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:20480',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'tahun_id.required' => 'Tahun tidak boleh kosong',
                'file.required' => 'Dokumen tidak boleh kosong',
                'file.mimes' => 'Dokumen harus berformat : pdf / doc / docx / ppt / pptx / xls / xlsx',
                'file.max' => 'Dokumen tidak boleh berukuran lebih dari 20 MB'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $file = time() . '.' . $request->file->extension();
        $request->file->storeAs('uploads/dokumen/roadMap', $file);

        $roadMap = new RoadMap();
        $roadMap->nama = $request->nama;
        $roadMap->tahun_id = $request->tahun_id;
        $roadMap->file = $file;
        $roadMap->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoadMap  $roadMap
     * @return \Illuminate\Http\Response
     */
    public function show(RoadMap $roadMap)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoadMap  $roadMap
     * @return \Illuminate\Http\Response
     */
    public function edit(RoadMap $roadMap)
    {
        $id = $roadMap->tahun_id;
        $daftarTahun = Tahun::orderBy('tahun', 'asc')->get();

        if ($id) {
            $tahunHapus = Tahun::where('id', $id)->withTrashed()->first();
            if ($tahunHapus->trashed()) {
                $daftarTahun->push($tahunHapus);
            }
        }
        return view('dashboard.pages.dokumen.roadMap.edit', compact(['daftarTahun', 'roadMap']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoadMap  $roadMap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoadMap $roadMap)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'tahun_id' => 'required',
                'file' => $request->file ? 'required|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:20480' : 'nullable',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'tahun_id.required' => 'Tahun tidak boleh kosong',
                'file.required' => 'Dokumen tidak boleh kosong',
                'file.mimes' => 'Dokumen harus berformat : pdf / doc / docx / ppt / pptx / xls / xlsx',
                'file.max' => 'Dokumen tidak boleh berukuran lebih dari 20 MB'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if ($request->file) {
            if (Storage::exists('uploads/dokumen/roadMap/' . $roadMap->file)) {
                Storage::delete('uploads/dokumen/roadMap/' . $roadMap->file);
            }

            $file = time() . '.' . $request->file->extension();
            $request->file->storeAs('uploads/dokumen/roadMap', $file);
            $roadMap->file = $file;
        }

        $roadMap->nama = $request->nama;
        $roadMap->tahun_id = $request->tahun_id;
        $roadMap->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoadMap  $roadMap
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoadMap $roadMap)
    {
        $roadMap->delete();

        if (Storage::exists('uploads/dokumen/roadMap/' . $roadMap->file)) {
            Storage::delete('uploads/dokumen/roadMap/' . $roadMap->file);
        }

        return response()->json(['status' => 'success']);
    }
}
