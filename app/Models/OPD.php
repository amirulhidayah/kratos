<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\TraitUuid;


class OPD extends Model
{
    use HasFactory, TraitUuid, SoftDeletes;

    protected $table = 'opd';
    protected $guarded = ['id'];
}
