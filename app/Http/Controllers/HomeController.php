<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matkul;
use App\Dosen;
use App\Kelas;
use App\User;
use DB;
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
        $user = User::where('rules','asdos')->get();
        return view('pages.admin.dashboard',compact('matkul','dosen','kelas','user'));
    }
}
