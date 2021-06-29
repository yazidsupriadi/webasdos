<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Presensi;
use Auth;
use App\JadwalPraktikum;
use App\Gaji;
use App\Insentif;
use App\User;
class PresensiController extends Controller
{
    //
    public function asdos_presensi(){
        $users = User::where('rules','asdos')->get();
        return view('pages.admin.presensi.presensi_asdos',compact('users'));
    }

    public function detailpresensi($id){
        $presensis = Presensi::where('user_id','=',$id)->get();
        return view('pages.admin.presensi.index',compact('presensis'));
    }

    
    public function indexasdos(){
        $insentif = Insentif::all();
        $presensis = Auth::user()->presensi()->get();;
        return view('pages.asdos.presensi.index',compact('presensis','insentif'));
    }

    public function addasdos(){
        
        $insentif = Insentif::all();
        $presensis = Presensi::all();
        $jadwals = Auth::user()->jadwal_praktek()->get();
        return view('pages.asdos.presensi.add',compact('presensis','jadwals','insentif'));
    }

    
    public function asdosstore(Request $request){
        $presensi = new Presensi;
        $presensi->tanggal_praktek = $request->tanggal_praktek;
        $presensi->pertemuan = $request->pertemuan;
        $presensi->rekap_absen = $request->rekap_absen;
        $presensi->keterangan = $request->keterangan;
        $presensi->user_id = $request->user_id;
        $presensi->jadwal_praktikum_id = $request->jadwal_praktikum_id;
        $presensi->save();

        $insentif = Insentif::all();

        $gaji = new Gaji;
        $gaji->kode_gaji = Str::random(6);
        $gaji->bulan_gaji = date('M',strtotime($presensi->tanggal_praktek));
        $gaji->total += $request->total;
        $gaji->insentif_id = $request->insentif_id;
        $gaji->status = $request->status;
        $gaji->user_id = $request->user_id;
        $gaji->save();
        return redirect('/asdos/presensi');
    }

    
    public function presensidelete($id){
        $presensi = Presensi::find($id);
        $presensi->delete();
        return redirect()->back();
    }
}
