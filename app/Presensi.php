<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    //
    protected $table ='presensi';
    protected $fillable = ['tanggal_praktek','pertemuan','rekap_absen','keterangan','user_id','jadwal_praktikum_id'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function jadwal_praktek(){
    	return $this->belongsTo(JadwalPraktikum::class,'jadwal_praktikum_id','id');
    }

}
