<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitUuid;


class LokasiPerencanaanHewan extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'lokasi_perencanaan_hewan';
    protected $guarded = ['id'];

    public function lokasiHewan()
    {
        return $this->belongsTo(LokasiHewan::class, 'lokasi_hewan_id')->withTrashed();
    }

    public function perencanaanHewan()
    {
        return $this->belongsTo(PerencanaanHewan::class);
    }

    public function realisasiHewan()
    {
        return $this->belongsTo(RealisasiHewan::class);
    }
}
