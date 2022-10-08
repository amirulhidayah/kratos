<?php

namespace App\Imports;

use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Posyandu;
use App\Models\Puskesmas;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class PuskesmasPosyanduImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $kecamatan = Kecamatan::where('nama', $row['kecamatan'])->first();
            $desa = Desa::where('nama', $row['desa'])->first();
            $puskesmas = Puskesmas::where('nama', $row['puskesmas'])->first();

            if (!$desa) {
                $desa = new Desa();
            }
            $desa->nama = $row['desa'];
            $desa->kecamatan_id = $kecamatan->id;
            $desa->save();

            if (!$puskesmas) {
                $puskesmas = new Puskesmas();
                $puskesmas->nama = $row['puskesmas'];
                $puskesmas->kecamatan_id = $kecamatan->id;
                $puskesmas->save();
            }

            if ($row['posyandu']) {
                $posyandu = new Posyandu();
                $posyandu->nama = $row['posyandu'];
                $posyandu->puskesmas_id = $puskesmas->id;
                $posyandu->desa_id = $desa->id;
                $posyandu->save();
            }
        }
    }
}
