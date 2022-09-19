<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SekolahExport implements FromView
{
    protected $daftarJumlahData;
    protected $jenjang;

    function __construct($daftarJumlahData, $jenjang)
    {
        $this->daftarJumlahData = $daftarJumlahData;
        $this->jenjang = $jenjang;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $daftarJumlahData = $this->daftarJumlahData;
        $jenjang = $this->jenjang;
        return view('dashboard.pages.masterData.sekolah.sekolah.export', compact(['daftarJumlahData', 'jenjang']));
    }
}
