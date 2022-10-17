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

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function anak()
    {
        return $this->hasMany(Anak::class);
    }
}
