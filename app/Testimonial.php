<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Contracts\Auditable;
class Testimonial extends Model implements Auditable
{
    //
    
    use \OwenIt\Auditing\Auditable;
    protected $table = 'testimonial';
    protected $fillable = ['nama_asdos','matkul','tahun_akademik','foto','testimoni'];
}
