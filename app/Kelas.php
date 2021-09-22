<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Contracts\Auditable;

class Kelas extends Model implements Auditable
{
    //
    
    use \OwenIt\Auditing\Auditable;

    protected $table = 'kelas';
    
    protected $fillable = ['kode_kelas','prodi','angkatan','jumlah_mahasiswa','tahun_akademik'];

    public function jadwal_praktek(){
    	return $this->hasMany(JadwalPraktikum::class);
    }
}   
