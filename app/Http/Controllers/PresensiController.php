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
use App\TahunAkademik;
use App\Exports\PresensiExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Alert;
class PresensiController extends Controller
{
    //
    public function asdos_presensi(){
        $users = User::where('rules','asdos')->paginate(10);
        return view('pages.admin.presensi.presensi_asdos',compact('users'));
    }

    public function detailpresensi($id){
        
        $user = User::where('id','=',$id)->get();
        $presensis = Presensi::where('user_id','=',$id)->get();
        return view('pages.admin.presensi.index',compact('presensis','user'));
    }

    
    public function indexasdos(){
        $insentif = Insentif::paginate(8);
        $presensis = Auth::user()->presensi()->paginate(10);
        return view('pages.asdos.presensi.index',compact('presensis','insentif'));
    }

    public function addasdos(){
        
        $insentif = Insentif::all();
        $presensis = Presensi::all();
        $tahun_akademik = TahunAkademik::all();
        $jadwals = Auth::user()->jadwal_praktek()->get();
        return view('pages.asdos.presensi.add',compact('presensis','jadwals','insentif','tahun_akademik'));
    }

    
    public function asdosstore(Request $request){
        $presensi = new Presensi;
        $presensi->tanggal_praktek = $request->tanggal_praktek;
        $presensi->pertemuan = $request->pertemuan;
        $presensi->rekap_absen = $request->rekap_absen;
        $presensi->keterangan = $request->keterangan;
        $presensi->user_id = $request->user_id;
        $presensi->tahun_akademik_id = $request->tahun_akademik_id;
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
        Alert::success('Data Presensi Berhasil Dihapus','Data Berhasil dihapus!');
        return redirect()->back();
    }

    
    public function export_excel(Request $request)
	{
		return Excel::download(new PresensiExport($request->tahun,$request->bulan), 'presensi-asdos.xlsx');
	}

    public function export_excel_asdos(Request $request,$id)
	{
        
        $user = User::where('id','=',$id)->get();
		return Excel::download(new PresensiExport($request->tahun,$request->bulan,$id), 'presensi-data-asdos.xlsx');
	}
}
