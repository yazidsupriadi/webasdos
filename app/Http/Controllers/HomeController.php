<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matkul;
use App\Dosen;
use App\Kelas;
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
        $matkul = Matkul::all();
        $dosen = Dosen::all();
        $kelas = Kelas::all();
        return view('pages.admin.dashboard',compact('matkul','dosen','kelas'));
    }
}
