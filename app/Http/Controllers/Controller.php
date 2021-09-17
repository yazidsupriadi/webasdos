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
use App\HistoryAsdos;
use Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => 'required|captcha',
        ]);
    }



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
    
    public function daftar_matkul($id)
    {
        
        $asdos =  Auth::user()->asdos()->get();
        $history_asdos = HistoryAsdos::where('user_id','=',$id)->get();
        return view('pages.applicant.daftar_matkul',compact('asdos','history_asdos'));
    
    }
    public function daftar_matkul_caasdos($id)
    {
        
        $asdos =  Auth::user()->asdos()->get();
        $history_asdos = HistoryAsdos::where('user_id','=',$id)->get();
        $matkuls = Matkul::all();
        return view('pages.applicant.daftar_matkul_caasdos',compact('asdos','history_asdos','matkuls'));
    
    }
    public function isibiostore(Request $request){
        $asdos = $request->all();
        $asdos['foto'] = $request->file('foto')->store(
            'assets/foto','public'
        );
        Asdos::create($asdos);
        return redirect('/');
    }

    

    public function downloadberkas($file){


        return response()->download(storage_path('/app/public/assets/berkas/'.$file));
     }


}
