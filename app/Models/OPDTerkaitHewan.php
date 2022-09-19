<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitUuid;


class OPDTerkaitHewan extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'opd_terkait_hewan';
    protected $guarded = ['id'];

    public function opd()
    {
        return $this->belongsTo(OPD::class, 'opd_id')->orderBy('nama')->withTrashed();
    }
}
