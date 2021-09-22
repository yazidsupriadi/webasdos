<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Dosen extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    //
    protected $table = 'dosen';

    protected $fillable = ['nidn','nama'];

    
    public function matkul(){ 
        return $this->hasMany(Matkul::class); 
    }
}
