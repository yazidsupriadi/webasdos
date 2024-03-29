<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Matkul extends Model implements Auditable
{
    //
    
    use \OwenIt\Auditing\Auditable;
    protected $table = 'matkul';

    protected $fillable = ['nama','kodemk','keterangan','dosen_id','user_id'];

 
    public function dosen(){
    	return $this->belongsTo(Dosen::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function history_asdos(){ 
        return $this->hasMany(HistoryAsdos::class); 
    }

    public function jadwal_praktek(){ 
        return $this->hasMany(JadwalPraktikum::class); 
    }
    
    public function asdos(){ 
        return $this->hasMany(Asdos::class); 
    }
}
