<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalPraktikum extends Model
{
    //
    protected $table = 'jadwal_praktikum';
    protected $fillable = ['hari','jam','ruangan','rekap_absen','matkul_id','kelas_id','user_id'];

    public function matkul(){
    	return $this->belongsTo(Matkul::class);
    }

    public function kelas(){
    	return $this->belongsTo(Kelas::class);
    }
    
    public function user(){
    	return $this->belongsTo(User::class);
    }
    
}
