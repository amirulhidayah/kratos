<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Model;

class PerencanaanManusia extends Model
{
    use HasFactory;

    use HasFactory, TraitUuid;

    protected $table = 'perencanaan_manusia';
    protected $guarded = ['id'];

    public function opd()
    {
        return $this->belongsTo(OPD::class)->withTrashed();
    }

    public function opdTerkaitManusia()
    {
        return $this->hasMany(OPDTerkaitManusia::class);
    }

    public function pendudukPerencanaanManusia()
    {
        return $this->hasMany(PendudukPerencanaanManusia::class)->orderBy('updated_at', 'DESC');
    }

    public function dokumenPerencanaanManusia()
    {
        return $this->hasMany(DokumenPerencanaanManusia::class)->orderBy('no_urut');
    }

    public function realisasiManusia()
    {
        return $this->hasMany(RealisasiManusia::class);
    }
}
