<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitUuid;


class Realisasi extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'realisasi';
    protected $guarded = ['id'];

    public function perencanaan()
    {
        return $this->belongsTo(Perencanaan::class, 'perencanaan_id');
    }

    public function desaRealisasi()
    {
        return $this->hasMany(DesaPerencanaan::class, 'realisasi_id')->orderBy('updated_at', 'DESC');
    }

    public function dokumenRealisasi()
    {
        return $this->hasMany(DokumenRealisasi::class, 'realisasi_id')->orderBy('no_urut');
    }
}
