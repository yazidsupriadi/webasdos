<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Insentif extends Model implements Auditable
{
    //
    
    use \OwenIt\Auditing\Auditable;
    protected $table = 'insentif';
    protected $fillable = ['tipe_insentif','kategori','nilai','tahun_akademik'];

    public function gaji(){
    	return $this->hasMany(Gaji::class);
    }
}
