<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asdos extends Model
{
    //
    protected $table = 'asdos';
    protected $fillable = ['user_id','kode','birthday_place','birthday','angkatan','username_elen','bank','norek','atasnama','berkas','nim','no_hp','foto'];
   
    public function user() { 
        return $this->belongsTo(User::class,'user_id','id'); 
  }
  
 
}
