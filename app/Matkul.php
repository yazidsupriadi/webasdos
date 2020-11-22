<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    //
    protected $table = 'matkul';

    protected $fillable = ['nama','kodemk','keterangan','dosen_id'];

 
    public function dosen(){
    	return $this->belongsTo(Dosen::class);
    }

    public function jadwal_praktek(){ 
        return $this->hasMany(JadwalPraktikum::class); 
    }
}
