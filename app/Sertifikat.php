<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    //
    protected $table = 'sertifikat';

    protected $fillable = ['no_sertifikat','nama','jabatan','matkul','sertifikat_file','user_id'];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
