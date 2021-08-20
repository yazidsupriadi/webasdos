<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
class User extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','rules','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function jadwal_praktek(){
    	return $this->hasMany(JadwalPraktikum::class);
    }
    public function matkul(){
    	return $this->hasMany(Matkul::class);
    }
    
    public function presensi(){
    	return $this->hasMany(Presensi::class);
    }
    public function gaji(){
    	return $this->hasMany(Gaji::class);
    }
    public function asdos()
    {
    	return $this->hasOne(Asdos::class);
    }
    public function sertifikat(){
    	return $this->hasMany(Sertifikat::class);
    }
    
}
