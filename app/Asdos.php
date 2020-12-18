<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asdos extends Model
{
    //
    protected $table = 'asdos';
    protected $fillabel = ['asdos_id','kode','birtday_place','birtday','angkatan','username_elen','bank','norek','atasnama'];
   
    public function asdos() { 
        return $this->belongsTo(User::class,'asdos_id','id'); 
  }
}
