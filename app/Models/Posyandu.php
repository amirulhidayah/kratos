<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posyandu extends Model
{
    use HasFactory, TraitUuid, SoftDeletes;

    protected $table = 'posyandu';

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class);
    }
}
