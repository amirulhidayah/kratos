<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class LokasiPerencanaan extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'lokasi_perencanaan';
    protected $guarded = ['id'];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id')->withTrashed();
    }

    public function perencanaan()
    {
        return $this->belongsTo(Perencanaan::class);
    }

    public function realisasi()
    {
        return $this->belongsTo(Realisasi::class);
    }
}
