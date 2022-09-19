<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class DesaExport implements FromView
{
    protected $daftarDesa;

    function __construct($daftarDesa)
    {
        $this->daftarDesa = $daftarDesa;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $daftarDesa = $this->daftarDesa;
        return view('dashboard.pages.masterData.lokasi.desa.export', compact(['daftarDesa']));
    }
}
