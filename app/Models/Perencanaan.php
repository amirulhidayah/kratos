<?php

namespace App\Models;

use App\Models\OPD;
use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perencanaan extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'perencanaan';
    protected $guarded = ['id'];

    public function opd()
    {
        return $this->belongsTo(OPD::class, 'opd_id')->withTrashed();
    }

    public function indikator()
    {
        return $this->belongsTo(Indikator::class)->withTrashed();
    }

    public function opdTerkait()
    {
        return $this->hasMany(OPDTerkait::class, 'perencanaan_id');
    }

    public function dokumenPerencanaan()
    {
        return $this->hasMany(DokumenPerencanaan::class, 'perencanaan_id')->orderBy('no_urut');
    }

    public function realisasi()
    {
        return $this->hasOne(Realisasi::class, 'perencanaan_id');
    }

    public function sumberDana()
    {
        return $this->belongsTo(SumberDana::class)->withTrashed();
    }
}
