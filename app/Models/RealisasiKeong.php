<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitUuid;


class RealisasiKeong extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'realisasi_keong';
    protected $guarded = ['id'];

    public function perencanaanKeong()
    {
        return $this->belongsTo(PerencanaanKeong::class, 'perencanaan_keong_id');
    }

    public function lokasiRealisasiKeong()
    {
        return $this->hasMany(LokasiPerencanaanKeong::class, 'realisasi_keong_id')->orderBy('updated_at', 'DESC');
    }

    public function dokumenRealisasiKeong()
    {
        return $this->hasMany(DokumenRealisasiKeong::class, 'realisasi_keong_id')->orderBy('no_urut');
    }
}
