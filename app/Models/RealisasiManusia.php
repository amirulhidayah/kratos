<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitUuid;

class RealisasiManusia extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'realisasi_manusia';
    protected $guarded = ['id'];

    public function perencanaanManusia()
    {
        return $this->belongsTo(PerencanaanManusia::class, 'perencanaan_manusia_id');
    }

    public function pendudukRealisasiManusia()
    {
        return $this->hasMany(PendudukPerencanaanManusia::class, 'realisasi_manusia_id')->orderBy('updated_at', 'DESC');
    }

    public function dokumenRealisasiManusia()
    {
        return $this->hasMany(DokumenRealisasiManusia::class, 'realisasi_manusia_id')->orderBy('no_urut');
    }
}
