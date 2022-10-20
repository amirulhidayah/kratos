<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indikator extends Model
{
    use HasFactory;
    use SoftDeletes;
    use TraitUuid;

    protected $table = 'indikator';

    public function perencanaan()
    {
        return $this->hasOne(Perencanaan::class);
    }
}
