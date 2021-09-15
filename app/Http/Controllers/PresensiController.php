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
use DB;
class PresensiController extends Controller
{
    //
    public function asdos_presensi(){
        $users = User::where('rules','asdos')->paginate(10);
        return view('pages.admin.presensi.presensi_asdos',compact('users'));
    }

    public function detailpresensi($id){
        $presensis = Presensi::where('user_id','=',$id)->get();
        return view('pages.admin.presensi.index',compact('presensis'));
    }

    
    public function indexasdos(){
        $insentif = Insentif::paginate(8);
        $presensis = Auth::user()->presensi()->paginate(10);
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
        $gaji->presensi_id = $presensi->id;        
        $gaji->save();
        return redirect('/asdos/presensi');
    }

    
    public function presensidelete($id){
        DB::table("presensi")->where("id", $id)->delete();
        DB::table("gaji")->where("presensi_id", $id)->delete();
        return redirect()->back();
    }
}
