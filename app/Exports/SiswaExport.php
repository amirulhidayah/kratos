<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SiswaExport implements FromView
{
    protected $daftarSiswa;
    protected $sekolah;

    function __construct($daftarSiswa, $sekolah)
    {
        $this->daftarSiswa = $daftarSiswa;
        $this->sekolah = $sekolah;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $daftarSiswa = $this->daftarSiswa;
        $sekolah = $this->sekolah;
        return view('dashboard.pages.masterData.sekolah.siswa.export', compact(['daftarSiswa', 'sekolah']));
    }
}
