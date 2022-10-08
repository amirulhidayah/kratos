<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HitungController extends Controller
{
    public function pengukuranAnak(Request $request)
    {
        $tanggalLahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
        $tanggalUkur = Carbon::parse($request->tanggal_pengukuran)->format('Y-m-d');
        $usiaBulan = usiaBulan($tanggalLahir, $tanggalUkur);
        $usiaSebut = usiaSebut($tanggalLahir, $tanggalUkur);
        $bbu = bbu($usiaBulan, $request->jenis_kelamin, $request->berat_badan);
        $tbu = tbu($usiaBulan, $request->jenis_kelamin, $request->tinggi_badan);
        $bbtb = bbtb($usiaBulan, $request->jenis_kelamin, $request->tinggi_badan, $request->berat_badan);

        $cekTanggalUkur = Carbon::parse($tanggalUkur)->gt(Carbon::parse($tanggalLahir));

        if ($request->tanggal_lahir && $request->tanggal_pengukuran && $request->jenis_kelamin && $request->berat_badan && $request->tinggi_badan && $cekTanggalUkur) {
            return response()->json([
                'status' => 'success',
                'usiaBulan' => $usiaBulan,
                'usiaSebut' => $usiaSebut,
                'bbu' => $bbu,
                'tbu' => $tbu,
                'bbtb' => $bbtb
            ]);
        } else if (!$cekTanggalUkur) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tanggal pengukuran tidak boleh kurang dari tanggal lahir'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
