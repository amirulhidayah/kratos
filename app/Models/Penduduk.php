<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penduduk extends Model
{
    use HasFactory;
    use TraitUuid;
    use SoftDeletes;

    protected $table = 'penduduk';

    public function desa()
    {
        return $this->belongsTo(Desa::class)->withTrashed();
    }

    public function listIndikator()
    { // untuk hasil realisasi
        return $this->hasMany(PendudukPerencanaanManusia::class)->where('status', 1);
    }
}
