<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Contracts\Auditable;
class Sertifikat extends Model implements Auditable
{
    //
    
    use \OwenIt\Auditing\Auditable;
    protected $table = 'sertifikat';

    protected $fillable = ['no_sertifikat','nama','jabatan','matkul','sertifikat_file','tahun_akademik','user_id'];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
