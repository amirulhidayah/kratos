<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\TraitUuid;

class Lokasi extends Model
{
    use HasFactory, TraitUuid, SoftDeletes;

    protected $table = 'lokasi';
    protected $guarded = ['id'];

    public function desa()
    {
        return $this->belongsTo(Desa::class)->withTrashed();
    }

    public function pemilikLokasi()
    {
        return $this->hasMany(PemilikLokasi::class)->withTrashed();
    }

    public function lokasiPerencanaan()
    {
        return $this->hasOne(LokasiPerencanaan::class)->withTrashed();
    }

    public function listIndikator()
    { // untuk hasil realisasi
        return $this->hasMany(LokasiPerencanaan::class)->where('status', 1);
    }
}
