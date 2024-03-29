<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class HistoryAsdos extends Model implements Auditable
{
    //
    
    use \OwenIt\Auditing\Auditable;
    
    protected $table = 'history_asdos';
    protected $fillable = ['status','user_id','matkul_id','tahun_akademik_id'];

    public function user() { 
        return $this->belongsTo(User::class,'user_id','id'); 
    }

    public function matkul() { 
        return $this->belongsTo(Matkul::class,'matkul_id','id'); 
  }
  public function tahun_akademik() { 
    return $this->belongsTo(TahunAkademik::class,'tahun_akademik_id','id'); 
}



}
