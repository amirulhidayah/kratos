<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\TraitUuid;

class OPDTerkaitKeong extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'opd_terkait_keong';
    protected $guarded = ['id'];

    public function opd()
    {
        return $this->belongsTo(OPD::class, 'opd_id')->orderBy('nama')->withTrashed();
    }
}
