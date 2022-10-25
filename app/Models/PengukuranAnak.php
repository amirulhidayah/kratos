<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengukuranAnak extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'pengukuran_anak';

    public function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class);
    }

    public function posyandu()
    {
        return $this->belongsTo(Posyandu::class);
    }

    public function anak()
    {
        return $this->belongsTo(Anak::class);
    }
}
