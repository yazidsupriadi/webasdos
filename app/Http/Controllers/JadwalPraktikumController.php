<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalPraktikum;
use App\Matkul;
use App\Kelas;
use App\User;
use App\Ruangan;
use Auth;
class JadwalPraktikumController extends Controller
{
    //
    public function index(){
        $jadwals = JadwalPraktikum::all();
        return view('pages.admin.jadwal_praktek.index',compact('jadwals'));
    }

    public function add(){
        $matkuls = Matkul::all();
        $jadwals = JadwalPraktikum::all();
        $users = User::all();
        $kelas = Kelas::all();
        $ruangan = Ruangan::all();
        return view('pages.admin.jadwal_praktek.add',compact('jadwals','matkuls','kelas','users','ruangan'));
    }
    public function addasdos(){
        $matkuls = Matkul::all();
        $jadwals = JadwalPraktikum::all();
        $users = User::all();
        $kelas = Kelas::all();
        return view('pages.asdos.jadwal_praktek.add',compact('jadwals','matkuls','kelas','users'));
    }

    public function store(Request $request){
        $jadwal = $request->all();
        JadwalPraktikum::create($jadwal);
        return redirect('/admin/jadwal-praktikum');
    }
    public function storeasdos(Request $request){
        $jadwal = $request->all();
        JadwalPraktikum::create($jadwal);
        return redirect('/asdos/jadwal-praktikum');
    }
    public function delete($id){
        $jadwal = JadwalPraktikum::find($id);
        $jadwal->delete();
        return redirect()->back();
    }

    public function asdosindex(){
        $jadwals = Auth::user()->jadwal_praktek()->get();
        return view('pages.asdos.jadwal_praktek.index',compact('jadwals'));
        
    }

}
