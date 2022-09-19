<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemilikLokasiHewan extends Model
{
    use HasFactory;
    use TraitUuid;
    use SoftDeletes;

    protected $table = 'pemilik_lokasi_hewan';
    protected $fillable = ['lokasi_hewan_id', 'penduduk_id'];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class)->withTrashed();
    }
}
