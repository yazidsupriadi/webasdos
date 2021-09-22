<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Contracts\Auditable;
class TahunAkademik extends Model implements Auditable
{
    //
    
    use \OwenIt\Auditing\Auditable;
    protected $table = 'tahun_akademik';
    protected $fillable = ['kode_tahun_akademik','tahun'];

    public function jadwal_praktek(){ 
        return $this->hasMany(JadwalPraktikum::class); 
    }

    public function presensi(){ 
        return $this->hasMany(Presensi::class); 
    }
   
}
