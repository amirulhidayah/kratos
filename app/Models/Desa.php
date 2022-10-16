<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desa extends Model
{
    use HasFactory;
    use SoftDeletes;
    use TraitUuid;

    protected $table = 'desa';
    protected $appends = ['koordinatPolygon'];

    public function getKoordinatPolygonAttribute()
    {
        return json_decode($this->polygon);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class)->orderBy('nama');
    }

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class, 'desa_id')->orderBy('nama');
    }
}
