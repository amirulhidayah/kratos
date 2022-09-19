<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class HasilRealisasiManusiaExport implements FromView
{
    protected $dataRealisasi;
    /**
     * @return \Illuminate\Support\Collection
     */
    function __construct($dataRealisasi)
    {
        $this->dataRealisasi = $dataRealisasi;
    }

    public function view(): View
    {
        return view('dashboard.pages.hasilRealisasi.manusia.export', ['dataRealisasi' => $this->dataRealisasi]);
    }
}
