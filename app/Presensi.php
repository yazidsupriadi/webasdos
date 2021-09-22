<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Contracts\Auditable;

class Presensi extends Model implements Auditable
{
    //
    
    use \OwenIt\Auditing\Auditable;
    protected $table ='presensi';
    protected $fillable = ['tanggal_praktek','pertemuan','rekap_absen','keterangan','user_id','tahun_akademik_id','jadwal_praktikum_id'];

    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function tahun_akademik(){
    	return $this->belongsTo(TahunAkademik::class);
    }
    public function jadwal_praktek(){
    	return $this->belongsTo(JadwalPraktikum::class,'jadwal_praktikum_id','id');
    }
    

}
