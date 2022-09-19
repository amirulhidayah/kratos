<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Model;

class PendudukPerencanaanManusia extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'penduduk_perencanaan_manusia';
    protected $guarded = ['id'];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class)->withTrashed();
    }

    public function perencanaanManusia()
    {
        return $this->belongsTo(PerencanaanManusia::class);
    }

    public function realisasiManusia()
    {
        return $this->belongsTo(RealisasiManusia::class);
    }
}
