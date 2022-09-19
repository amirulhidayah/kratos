<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitUuid;

class DokumenPerencanaanManusia extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'dokumen_perencanaan_manusia';
    protected $guarded = ['id'];
}
