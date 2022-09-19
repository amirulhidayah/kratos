<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class JenjangSekolahExport implements FromView
{
    protected $daftarJumlahData;
    protected $daftarDesa;

    function __construct($daftarJumlahData, $daftarDesa)
    {
        $this->daftarJumlahData = $daftarJumlahData;
        $this->daftarDesa = $daftarDesa;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $daftarJumlahData = $this->daftarJumlahData;
        $daftarDesa = $this->daftarDesa;
        return view('dashboard.pages.masterData.sekolah.jenjangSekolah.export', compact(['daftarJumlahData', 'daftarDesa']));
    }
}
