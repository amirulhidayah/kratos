<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class DemografiLokasiHewanExport implements FromView
{
    protected $daftarJumlahHewan;
    protected $daftarHewan;

    function __construct($daftarJumlahHewan, $daftarHewan)
    {
        $this->daftarJumlahHewan = $daftarJumlahHewan;
        $this->daftarHewan = $daftarHewan;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $daftarJumlahHewan = $this->daftarJumlahHewan;
        $daftarHewan = $this->daftarHewan;
        return view('dashboard.pages.masterData.lokasi.hewan.exportDemografi', compact(['daftarJumlahHewan', 'daftarHewan']));
    }
}
