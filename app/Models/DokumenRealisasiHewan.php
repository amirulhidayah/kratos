<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitUuid;


class DokumenRealisasiHewan extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'dokumen_realisasi_hewan';
    protected $guarded = ['id'];
}
