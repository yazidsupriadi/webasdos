<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = 'kelas';
    
    protected $fillable = ['kode_kelas','prodi','angkatan','jumlah_mahasiswa','tahun_akademik'];

    public function jadwal_praktek(){
    	return $this->hasMany(JadwalPraktikum::class);
    }
}   
