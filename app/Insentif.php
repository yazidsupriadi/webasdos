<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insentif extends Model
{
    //
    protected $table = 'insentif';
    protected $fillable = ['tipe_insentif','kategori','nilai','tahun_akademik'];

    public function gaji(){
    	return $this->hasMany(Gaji::class);
    }
}
