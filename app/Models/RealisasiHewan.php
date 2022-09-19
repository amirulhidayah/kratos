<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitUuid;


class RealisasiHewan extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'realisasi_hewan';
    protected $guarded = ['id'];

    public function perencanaanHewan()
    {
        return $this->belongsTo(PerencanaanHewan::class, 'perencanaan_hewan_id');
    }

    public function lokasiRealisasiHewan()
    {
        return $this->hasMany(LokasiPerencanaanHewan::class, 'realisasi_hewan_id')->orderBy('updated_at', 'DESC');
    }

    public function dokumenRealisasiHewan()
    {
        return $this->hasMany(DokumenRealisasiHewan::class, 'realisasi_hewan_id')->orderBy('no_urut');
    }
}
