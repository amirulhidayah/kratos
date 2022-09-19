<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PerencanaanManusiaExport implements FromView
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
        return view('dashboard.pages.intervensi.perencanaan.manusia.subIndikator.export', ['dataPerencanaan' => $this->dataPerencanaan]);
    }
}
