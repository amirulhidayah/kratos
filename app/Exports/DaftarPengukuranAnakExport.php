<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class DaftarPengukuranAnakExport implements FromView
{
    protected $daftarPengukuranAnak;
    protected $jenisKelamin;
    protected $bbU;
    protected $tbU;
    protected $bbTb;
    protected $jenisFilter;
    protected $kecamatan;
    protected $desa;
    protected $puskesmas;
    protected $posyandu;

    function __construct($daftarPengukuranAnak, $jenisKelamin, $bbU, $tbU, $bbTb, $jenisFilter, $kecamatan, $desa, $puskesmas, $posyandu)
    {
        $this->daftarPengukuranAnak = $daftarPengukuranAnak;
        $this->jenisKelamin = $jenisKelamin;
        $this->bbU = $bbU;
        $this->tbU = $tbU;
        $this->bbTb = $bbTb;
        $this->jenisFilter = $jenisFilter;
        $this->kecamatan = $kecamatan;
        $this->desa = $desa;
        $this->puskesmas = $puskesmas;
        $this->posyandu = $posyandu;
    }

    public function view(): View
    {
        $daftarPengukuranAnak = $this->daftarPengukuranAnak;
        $jenisKelamin = $this->jenisKelamin;
        $bbU = $this->bbU;
        $tbU = $this->tbU;
        $bbTb = $this->bbTb;
        $jenisFilter = $this->jenisFilter;
        $kecamatan = $this->kecamatan;
        $desa = $this->desa;
        $puskesmas = $this->puskesmas;
        $posyandu = $this->posyandu;

        return view('dashboard.pages.daftarPengukuranAnak.export', compact(['daftarPengukuranAnak', 'jenisKelamin', 'bbU', 'tbU', 'bbTb', 'jenisFilter', 'kecamatan', 'desa', 'puskesmas', 'posyandu']));
    }
}
