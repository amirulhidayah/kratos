<?php

namespace App\Http\Controllers;

use App\Imports\LokasiKeongImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function lokasiKeong()
    {
        Excel::import(new LokasiKeongImport, 'lokasiKeong.xlsx');

        return 'Import Berhasil';
    }
}
