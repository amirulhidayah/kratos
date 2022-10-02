<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesaPerencanaan extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'desa_perencanaan';
    protected $guarded = ['id'];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
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
