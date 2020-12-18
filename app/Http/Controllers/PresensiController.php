<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presensi;
use Auth;
use App\JadwalPraktikum;
class PresensiController extends Controller
{
    //
    public function index(){
        $presensis = Presensi::all();
        return view('pages.admin.presensi.index',compact('presensis'));
    }

    
    public function indexasdos(){
        $presensis = Auth::user()->presensi()->get();;
        return view('pages.asdos.presensi.index',compact('presensis'));
    }

    public function addasdos(){
        $presensis = Presensi::all();
        $jadwals = Auth::user()->jadwal_praktek()->get();
        return view('pages.asdos.presensi.add',compact('presensis','jadwals'));
    }

    
    public function asdosstore(Request $request){
        $presensi = $request->all();
        Presensi::create($presensi);
        return redirect('/asdos/presensi');
    }

    
    public function presensidelete($id){
        $presensi = Presensi::find($id);
        $presensi->delete();
        return redirect()->back();
    }
}
