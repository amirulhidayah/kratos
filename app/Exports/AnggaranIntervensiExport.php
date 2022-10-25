<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class AnggaranIntervensiExport implements FromView
{
    protected $tabelAnggaran;
    protected $tahun;
    protected $daftarSumberDana;

    function __construct($tabelAnggaran, $tahun, $daftarSumberDana)
    {
        $this->tabelAnggaran = $tabelAnggaran;
        $this->tahun = $tahun;
        $this->daftarSumberDana = $daftarSumberDana;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $tabelAnggaran = $this->tabelAnggaran;
        $tahun = $this->tahun;
        $daftarSumberDana = $this->daftarSumberDana;

        return view('dashboard.pages.exportDashboard.anggaran.index', compact([
            'tabelAnggaran',
            'tahun',
            'daftarSumberDana'
        ]));
    }
}
