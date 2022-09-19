<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class AnggaranIntervensiExport implements FromView
{
    protected $tipe;
    protected $tabelAnggaranKeong;
    protected $tabelAnggaranManusia;
    protected $tabelAnggaranHewan;
    protected $tabelAnggaranSemua;
    protected $tahun;

    function __construct($tipe, $tabelAnggaranKeong, $tabelAnggaranManusia, $tabelAnggaranHewan, $tabelAnggaranSemua, $tahun)
    {
        $this->tipe = $tipe;
        $this->tabelAnggaranKeong = $tabelAnggaranKeong;
        $this->tabelAnggaranManusia = $tabelAnggaranManusia;
        $this->tabelAnggaranHewan = $tabelAnggaranHewan;
        $this->tabelAnggaranSemua = $tabelAnggaranSemua;
        $this->tahun = $tahun;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $tipe = $this->tipe;
        $tabelAnggaranKeong = $this->tabelAnggaranKeong;
        $tabelAnggaranManusia = $this->tabelAnggaranManusia;
        $tabelAnggaranHewan = $this->tabelAnggaranHewan;
        $tabelAnggaranSemua = $this->tabelAnggaranSemua;
        $tahun = $this->tahun;
        $view = '';

        if ($tipe == 'semua') {
            $view = 'dashboard.pages.exportDashboard.anggaran.semua';
        } else if ($tipe == 'keong') {
            $view = 'dashboard.pages.exportDashboard.anggaran.keong';
        } else if ($tipe == 'manusia') {
            $view = 'dashboard.pages.exportDashboard.anggaran.manusia';
        } else {
            $view = 'dashboard.pages.exportDashboard.anggaran.hewan';
        }

        return view($view, compact([
            'tabelAnggaranKeong',
            'tabelAnggaranManusia',
            'tabelAnggaranHewan',
            'tabelAnggaranSemua',
            'tahun'
        ]));
    }
}
