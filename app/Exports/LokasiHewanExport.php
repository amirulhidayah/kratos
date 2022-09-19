<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class LokasiHewanExport implements FromView
{
    protected $jumlahLokasiHewan;
    protected $daftarHewan;

    function __construct($jumlahLokasiHewan, $daftarHewan)
    {
        $this->jumlahLokasiHewan = $jumlahLokasiHewan;
        $this->daftarHewan = $daftarHewan;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $jumlahLokasiHewan = $this->jumlahLokasiHewan;
        $daftarHewan = $this->daftarHewan;
        return view('dashboard.pages.masterData.lokasi.hewan.export', compact(['jumlahLokasiHewan', 'daftarHewan']));
    }
}
