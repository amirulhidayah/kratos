<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PerencanaanHewanExport implements FromView
{
    protected $dataPerencanaan;
    /**
     * @return \Illuminate\Support\Collection
     */
    function __construct($dataPerencanaan)
    {
        $this->dataPerencanaan = $dataPerencanaan;
    }

    public function view(): View
    {
        return view('dashboard.pages.intervensi.perencanaan.hewan.subIndikator.export', ['dataPerencanaan' => $this->dataPerencanaan]);
    }
}
