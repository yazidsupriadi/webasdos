<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asdos extends Model
{
    //
    protected $table = 'asdos';
    protected $fillable = ['user_id','kode','birthday_place','birthday','angkatan','username_elen','bank','norek','atasnama','berkas','matkul_id'];
   
    public function asdos() { 
        return $this->belongsTo(User::class,'asdos_id','id'); 
  }
  
  public function matkul() { 
    return $this->belongsTo(Matkul::class,'asdos_id','id'); 
}
}
