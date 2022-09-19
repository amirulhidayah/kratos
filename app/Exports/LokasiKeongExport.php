<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class LokasiKeongExport implements FromView
{
    protected $lokasiKeong;

    function __construct($lokasiKeong)
    {
        $this->lokasiKeong = $lokasiKeong;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $lokasiKeong = $this->lokasiKeong;
        return view('dashboard.pages.masterData.lokasi.keong.export', compact('lokasiKeong'));
    }
}
