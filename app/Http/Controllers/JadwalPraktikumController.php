<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalPraktikum;
use App\Matkul;
use App\Kelas;
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
        $kelas = Kelas::all();
        return view('pages.admin.jadwal_praktek.add',compact('jadwals','matkuls','kelas'));
    }

    public function store(Request $request){
        $jadwal = $request->all();
        JadwalPraktikum::create($jadwal);
        return redirect('/admin/jadwal-praktikum');
    }
    public function delete($id){
        $jadwal = JadwalPraktikum::find($id);
        $jadwal->delete();
        return redirect()->back();
    }

}