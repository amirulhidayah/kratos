<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class KecamatanExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $daftarKecamatan;

    function __construct($daftarKecamatan)
    {
        $this->daftarKecamatan = $daftarKecamatan;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $daftarKecamatan = $this->daftarKecamatan;
        return view('dashboard.pages.masterData.wilayah.kecamatan.export', compact(['daftarKecamatan']));
    }
}
