<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Hewan;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function desa(Request $request)
    {
        $id = $request->id;
        $desa = Desa::orderBy('nama', 'asc')->get();

        if ($id) {
            $desaHapus = Desa::where('id', $id)->withTrashed()->first();
            if ($desaHapus->trashed()) {
                $desa->push($desaHapus);
            }
        }

        return response()->json(['status' => 'success', 'data' => $desa]);
    }

    public function hewan(Request $request)
    {
        $id = $request->id;
        $hewan = Hewan::orderBy('nama', 'asc')->get();

        if ($id) {
            $hewanHapus = Hewan::where('id', $id)->withTrashed()->first();
            if ($hewanHapus->trashed()) {
                $hewan->push($hewanHapus);
            }
        }

        return response()->json(['status' => 'success', 'data' => $hewan, 'id' => $id]);
    }
}
