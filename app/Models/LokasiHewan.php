<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LokasiHewan extends Model
{
    use HasFactory;
    use TraitUuid;
    use SoftDeletes;

    protected $table = 'lokasi_hewan';

    public function desa()
    {
        return $this->belongsTo(Desa::class)->withTrashed();
    }

    public function jumlahHewan()
    {
        return $this->hasMany(JumlahHewan::class)->withTrashed();
    }

    public function pemilikLokasiHewan()
    {
        return $this->hasMany(PemilikLokasiHewan::class)->withTrashed();
    }

    public function listIndikator()
    { // untuk hasil realisasi
        return $this->hasMany(LokasiPerencanaanHewan::class)->where('status', 1);
    }
}
