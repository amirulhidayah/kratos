<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anak extends Model
{
    use HasFactory, TraitUuid, SoftDeletes;

    protected $table = 'anak';

    public function orangTua()
    {
        return $this->belongsTo(OrangTua::class);
    }

    public function pengukuranAnakTerakhir()
    {
        return $this->hasOne(PengukuranAnak::class)->orderBy('created_at', 'desc')->latestOfMany();
    }

    public function pengukuranAnak()
    {
        return $this->hasMany(PengukuranAnak::class);
    }

    public function scopeJenisKelamin($query, $value)
    {
        return $query->where(function ($query) use ($value) {
            if ($value && $value != "semua") {
                $query->where('jenis_kelamin', $value);
            }
        });
    }

    public function scopeDesa($query, $value)
    {
        if ($value && $value != "semua") {
            $query->whereHas('orangTua', function ($query) use ($value) {
                return $query->where('desa_id', $value);
            });
        }
    }

    public function scopeKecamatan($query, $value)
    {
        if ($value && $value != "semua") {
            $query->whereHas('orangTua', function ($query) use ($value) {
                $query->whereHas('desa', function ($query) use ($value) {
                    return $query->where('kecamatan_id', $value);
                });
            });
        }
    }

    public function scopebbU($query, $value)
    {
        if ($value && $value != "semua") {
            $query->whereHas('pengukuranAnakTerakhir', function ($query) use ($value) {
                return $query->where('bb_u', $value);
            });
        }
    }

    public function scopetbU($query, $value)
    {
        if ($query && $query != "semua") {
            $query->whereHas('pengukuranAnakTerakhir', function ($query) use ($value) {
                return $query->where('tb_u', $value);
            });
        }
    }

    public function scopebbTb($query, $value)
    {
        if ($query && $query != "semua") {
            $query->whereHas('pengukuranAnakTerakhir', function ($query) use ($value) {
                return $query->where('bb_tb', $value);
            });
        }
    }
}
