<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    //
    protected $table = 'gaji';
    protected $fillable = ['kode_gaji','bulan_gaji','total','insentif_id','status','user_id'];


    public function user() { 
        return $this->belongsTo(User::class,'user_id','id'); 
  }

    public function insentif() { 
    return $this->belongsTo(Insentif::class,'insentif_id','id'); 
    }
}
