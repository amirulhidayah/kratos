<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class JumlahPendudukExport implements FromView
{
    protected $daftarJumlahPenduduk;

    function __construct($daftarJumlahPenduduk)
    {
        $this->daftarJumlahPenduduk = $daftarJumlahPenduduk;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $daftarJumlahPenduduk = $this->daftarJumlahPenduduk;
        return view('dashboard.pages.masterData.penduduk.exportJumlahPenduduk', compact(['daftarJumlahPenduduk']));
    }
}
