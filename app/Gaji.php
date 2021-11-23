<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Gaji extends Model implements Auditable
{
    //
    use \OwenIt\Auditing\Auditable;

    protected $table = 'gaji';
    protected $fillable = ['kode_gaji','bulan_gaji','total','insentif_id','status','user_id','presensi_id'];


    public function user() { 
        return $this->belongsTo(User::class,'user_id','id'); 
  }

    public function insentif() { 
    return $this->belongsTo(Insentif::class,'insentif_id','id'); 
    }
    public function presensi() { 
        return $this->belongsTo(Presensi::class,'presensi_id','id'); 
        }
    
}
