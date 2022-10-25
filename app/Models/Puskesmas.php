<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Puskesmas extends Model
{
    use HasFactory, TraitUuid, SoftDeletes;

    protected $table = 'puskesmas';

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function posyandu()
    {
        return $this->hasMany(Posyandu::class);
    }
}
