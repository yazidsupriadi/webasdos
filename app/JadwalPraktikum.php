<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Contracts\Auditable;

class JadwalPraktikum extends Model implements Auditable
{
    //
    
    use \OwenIt\Auditing\Auditable;
    
    protected $table = 'jadwal_praktikum';
    protected $fillable = ['hari','jam','ruangan_id','rekap_absen','matkul_id','tahun_akademik_id','kelas_id','user_id'];

    public function matkul(){
    	return $this->belongsTo(Matkul::class);
    }
    public function ruangan(){
    	return $this->belongsTo(Ruangan::class);
    }
    public function kelas(){
    	return $this->belongsTo(Kelas::class);
    }
    public function tahun_akademik(){
    	return $this->belongsTo(TahunAkademik::class);
    }
    
    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function presensi(){
    	return $this->hasMany(Presensi::class);
    }

}
