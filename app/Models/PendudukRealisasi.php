<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitUuid;

class PendudukRealisasi extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'penduduk_realisasi';
    protected $guarded = ['id'];

    public function orangTua()
    {
        return $this->belongsTo(OrangTua::class)->withTrashed();
    }

    public function anak()
    {
        return $this->belongsTo(Anak::class)->withTrashed();
    }
}
