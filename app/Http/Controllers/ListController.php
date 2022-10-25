<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Desa;
use App\Models\Hewan;
use App\Models\Kecamatan;
use App\Models\OrangTua;
use App\Models\Posyandu;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function kecamatan(Request $request)
    {
        $id = $request->id;
        $kecamatan = Kecamatan::orderBy('nama', 'asc')->get();

        if ($id) {
            $kecamatanHapus = Kecamatan::where('id', $id)->withTrashed()->first();
            if ($kecamatanHapus->trashed()) {
                $kecamatan->push($kecamatanHapus);
            }
        }

        return response()->json(['status' => 'success', 'data' => $kecamatan]);
    }

    public function desa(Request $request)
    {
        $id = $request->id;
        $kecamatan = $request->kecamatan;
        $desa = Desa::orderBy('nama', 'asc')->where(function ($query) use ($kecamatan) {
            if ($kecamatan) {
                $query->where('kecamatan_id', $kecamatan);
            }
        })->get();

        if ($id) {
            $desaHapus = Desa::where('id', $id)->withTrashed()->first();
            if ($desaHapus->trashed()) {
                $desa->push($desaHapus);
            }
        }

        return response()->json(['status' => 'success', 'data' => $desa]);
    }

    public function orangTuaByDesa(Request $request)
    {
        $orangTua = OrangTua::where('desa_id', $request->desa)->get();
        return response()->json(['status' => 'success', 'data' => $orangTua]);
    }

    public function anak(Request $request)
    {
        $anak = Anak::where('orang_tua_id', $request->orang_tua)->get();
        return response()->json(['status' => 'success', 'data' => $anak]);
    }

    public function orangTua(Request $request)
    {
        $id = $request->id;
        $orangTua = OrangTua::with('desa', 'desa.kecamatan')->orderBy('created_at', 'desc')->get();

        if ($id) {
            $orangTuaHapus = OrangTua::where('id', $id)->withTrashed()->first();
            if ($orangTuaHapus->trashed()) {
                $orangTua->push($orangTuaHapus);
            }
        }

        return response()->json(['status' => 'success', 'data' => $orangTua]);
    }

    public function puskesmas(Request $request)
    {
        $id = $request->id;
        $puskesmas = Puskesmas::orderBy('nama', 'asc')->get();

        if ($id) {
            $puskesmasHapus = Puskesmas::where('id', $id)->withTrashed()->first();
            if ($puskesmasHapus->trashed()) {
                $puskesmas->push($puskesmasHapus);
            }
        }

        return response()->json(['status' => 'success', 'data' => $puskesmas]);
    }

    public function posyandu(Request $request)
    {
        $id = $request->id;
        $puskesmas = $request->puskesmas;
        $posyandu = Posyandu::orderBy('nama', 'asc')->where(function ($query) use ($puskesmas) {
            if ($puskesmas) {
                $query->where('puskesmas_id', $puskesmas);
            }
        })->get();

        if ($id) {
            $posyanduHapus = Posyandu::where('id', $id)->withTrashed()->first();
            if ($posyanduHapus->trashed()) {
                $posyandu->push($posyanduHapus);
            }
        }

        return response()->json(['status' => 'success', 'data' => $posyandu]);
    }
}
