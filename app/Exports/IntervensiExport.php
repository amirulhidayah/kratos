<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class IntervensiExport implements FromView
{
    protected $tabel;
    protected $tabelManusia;
    protected $tabelHewan;
    protected $tahun;

    function __construct($tabel, $tahun)
    {
        $this->tabel = $tabel;
        $this->tahun = $tahun;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $tabel = $this->tabel;
        $tahun = $this->tahun;

        return view('dashboard.pages.exportDashboard.intervensi.index', compact([
            'tabel',
            'tahun'
        ]));
    }
}
