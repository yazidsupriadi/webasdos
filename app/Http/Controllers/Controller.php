<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\User;
use Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function daftar(){
        return view('daftar');
    }
    public function registerasdos(){
        return view('pages.applicant.register');
    }
    public function storeregisterasdos(Request $data)
    {
        $tambahdata = ([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'rules' => $data['rules'],
            'password' => bcrypt($data['password']),
        ]);
        User::create($tambahdata);
        return redirect('/daftarasdos/isibio');
    
    }
    
    public function isibio()
    {
        
        $gajis = Auth::user()->get();
        return view('pages.applicant.isibio');
    
    }
}
