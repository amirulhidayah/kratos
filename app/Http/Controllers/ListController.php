<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Hewan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

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
}
