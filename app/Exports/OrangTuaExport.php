<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class OrangTuaExport implements FromView
{
    protected $daftarOrangTua;

    function __construct($daftarOrangTua)
    {
        $this->daftarOrangTua = $daftarOrangTua;
    }

    public function view(): View
    {
        $daftarOrangTua = $this->daftarOrangTua;
        return view('dashboard.pages.masterData.orangTua.export', compact(['daftarOrangTua']));
    }
}
