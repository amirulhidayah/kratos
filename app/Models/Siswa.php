<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    use TraitUuid;

    protected $table = 'siswa';

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class)->withTrashed();
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
}
