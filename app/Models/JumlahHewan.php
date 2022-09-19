<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JumlahHewan extends Model
{
    use HasFactory;
    use SoftDeletes;
    use TraitUuid;

    protected $table = 'jumlah_hewan';
    protected $fillable = ['lokasi_hewan_id', 'hewan_id', 'jumlah'];

    public function hewan()
    {
        return $this->belongsTo(Hewan::class)->withTrashed();
    }

    public function lokasiHewan()
    {
        return $this->hasMany(LokasiHewan::class, 'id', 'lokasi_hewan_id');
    }
}
