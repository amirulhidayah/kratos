<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class AnakExport implements FromView
{
    protected $daftarAnak;

    function __construct($daftarAnak)
    {
        $this->daftarAnak = $daftarAnak;
    }

    public function view(): View
    {
        $daftarAnak = $this->daftarAnak;
        return view('dashboard.pages.masterData.anak.export', compact(['daftarAnak']));
    }
}
