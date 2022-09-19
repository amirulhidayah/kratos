<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemilikLokasiKeong extends Model
{
    use HasFactory;
    use TraitUuid;
    use SoftDeletes;

    protected $table = 'pemilik_lokasi_keong';
    protected $fillable = ['lokasi_keong_id', 'penduduk_id'];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class)->withTrashed();
    }
}
