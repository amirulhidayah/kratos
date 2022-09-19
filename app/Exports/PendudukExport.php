<?php

namespace App\Exports;

use App\Models\Penduduk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PendudukExport implements FromView
{
    protected $daftarPenduduk;

    function __construct($daftarPenduduk)
    {
        $this->daftarPenduduk = $daftarPenduduk;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $daftarPenduduk = $this->daftarPenduduk;
        return view('dashboard.pages.masterData.penduduk.export', compact(['daftarPenduduk']));
    }
}
