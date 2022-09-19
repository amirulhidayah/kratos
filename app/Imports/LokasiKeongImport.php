<?php

namespace App\Imports;

use App\Models\LokasiKeong;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class LokasiKeongImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new LokasiKeong([
            'nama' => $row[0],
            'desa_id' => $row[1],
            'latitude' => $row[2],
            'longitude' => $row[3],
            'keterangan' => $row[4],
            'status' => 1,
            'created_at' => Carbon::now()
        ]);
    }
}
