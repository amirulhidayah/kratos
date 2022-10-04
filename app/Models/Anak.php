<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anak extends Model
{
    use HasFactory, TraitUuid, SoftDeletes;

    protected $table = 'anak';

    public function orangTua()
    {
        return $this->belongsTo(OrangTua::class);
    }
}
