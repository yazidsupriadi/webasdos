<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\User;
use App\Asdos;
use App\Dosen;
use App\Matkul;
use Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function home(){
        return view('home');
    }
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
        return redirect('/');
    
    }
    
    public function isibio()
    {
        $matkuls = Matkul::all();
        $users = Auth::user()->get();
        return view('pages.applicant.isibio',compact('matkuls'));
    
    }

    
    public function biocaasdos($id)
    {
        
        $asdos =  Auth::user()->asdos()->get();
        return view('pages.applicant.bio',compact('asdos'));
    
    }
    public function isibiostore(Request $request){
        $asdos = $request->all();
        $asdos['berkas'] = $request->file('berkas')->store(
            'assets/berkas','public'
        );
        Asdos::create($asdos);
        return redirect('/');
    }

    

    public function downloadberkas($file){


        return response()->download(storage_path('/app/public/assets/berkas/'.$file));
     }


}
