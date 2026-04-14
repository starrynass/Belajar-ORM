<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{

    protected $fillable = ['karyawan_id', 'gaji_pokok', 'bonus', 'tanggal_gajian'];
    
    public function karyawan()
{
    return $this->belongsTo(Karyawan::class);
}
}
