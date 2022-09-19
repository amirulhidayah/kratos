<?php

namespace App\Models;

use App\Traits\TraitUuid;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerencanaanHewan extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'perencanaan_hewan';
    protected $guarded = ['id'];

    public function opd()
    {
        return $this->belongsTo(OPD::class, 'opd_id')->withTrashed();
    }

    public function opdTerkaitHewan()
    {
        return $this->hasMany(OPDTerkaitHewan::class, 'perencanaan_hewan_id');
    }

    public function lokasiPerencanaanHewan()
    {
        return $this->hasMany(LokasiPerencanaanHewan::class, 'perencanaan_hewan_id')->orderBy('updated_at', 'DESC');
    }

    public function dokumenPerencanaanHewan()
    {
        return $this->hasMany(DokumenPerencanaanHewan::class, 'perencanaan_hewan_id')->orderBy('no_urut');
    }

    public function realisasiHewan()
    {
        return $this->hasMany(RealisasiHewan::class, 'perencanaan_hewan_id');
    }
}
