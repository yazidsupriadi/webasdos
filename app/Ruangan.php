<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Contracts\Auditable;
class Ruangan extends Model implements Auditable
{
    //
    
    use \OwenIt\Auditing\Auditable;
    
    protected $table = 'ruangan';
    protected $fillable = ['kode_ruangan','nama_ruangan','kapasitas_ruangan'];
    public function jadwal_praktek(){
    	return $this->hasMany(JadwalPraktikum::class);
    }
}
