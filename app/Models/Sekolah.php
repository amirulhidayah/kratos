<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sekolah extends Model
{
    use HasFactory;
    use SoftDeletes;
    use TraitUuid;

    protected $table = 'sekolah';

    public function desa()
    {
        return $this->belongsTo(Desa::class)->withTrashed();
    }
}
