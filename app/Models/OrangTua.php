<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrangTua extends Model
{
    use HasFactory, TraitUuid, SoftDeletes;

    protected $table = 'orang_tua';
    protected $appends = ['anakLewatTanggalLahir'];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function anak()
    {
        return $this->hasMany(Anak::class);
    }

    public function getAnakLewatTanggalLahirAttribute()
    {
        $anakLewatTanggalLahir = 0;
        foreach ($this->anak as $anak) {
            if (count($anak->pengukuranAnakLewatTanggalLahir) > 0) {
                $anakLewatTanggalLahir++;
            }
        }

        return $anakLewatTanggalLahir;
    }
}
