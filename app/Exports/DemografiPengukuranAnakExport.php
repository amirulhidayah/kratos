<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class DemografiPengukuranAnakExport implements FromView
{
    protected $tabelJumlah;

    function __construct($tabelJumlah)
    {
        $this->tabelJumlah = $tabelJumlah;
    }

    public function view(): View
    {
        $tabelJumlah = $this->tabelJumlah;
        return view('dashboard.pages.daftarPengukuranAnak.exportJumlah', compact(['tabelJumlah']));
    }
}
