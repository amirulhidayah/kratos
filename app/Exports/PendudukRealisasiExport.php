<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PendudukRealisasiExport implements FromView
{
    protected $dataPenduduk;
    /**
     * @return \Illuminate\Support\Collection
     */
    function __construct($dataPenduduk)
    {
        $this->dataPenduduk = $dataPenduduk;
    }

    public function view(): View
    {
        return view('dashboard.pages.intervensi.realisasi.exportPenduduk', ['dataPenduduk' => $this->dataPenduduk]);
    }
}
