<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matkul;
use App\Dosen;
use App\Kelas;
use App\User;
use App\Presensi;
use App\Ruangan;
use DB;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin(){
        $matkul = Matkul::distinct()->get(['nama']);
        $dosen = Dosen::all();
        $kelas = Kelas::all();
        $ruangan = Ruangan::all();
        $user = User::where('rules','asdos')->get();
        return view('pages.admin.dashboard',compact('matkul','dosen','kelas','user','ruangan'));
    }
    
    public function asdos(){
        $matkul = Matkul::distinct()->get(['nama']);
        $dosen = Dosen::all();
        $kelas = Kelas::all();
        $presensi = Presensi::where('user_id','=',Auth::user()->id)->get();
        $user = User::where('rules','asdos')->get();
        $ruangan = Ruangan::all();
        return view('pages.admin.dashboard',compact('matkul','dosen','kelas','user','presensi','ruangan'));
    }
}
