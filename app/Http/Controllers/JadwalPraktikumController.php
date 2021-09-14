<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalPraktikum;
use App\Matkul;
use App\Kelas;
use App\User;
use App\Ruangan;
use App\TahunAkademik;
use Auth;
use Alert;
class JadwalPraktikumController extends Controller
{
    //
    public function index(){
        $jadwals = JadwalPraktikum::where('hari','=','Senin')->get();
        return view('pages.admin.jadwal_praktek.index',compact('jadwals'));
    }

    public function add(){
        $matkuls = Matkul::all();
        $jadwals = JadwalPraktikum::all();
        $users = User::all();
        $kelas = Kelas::all();
        $ruangan = Ruangan::all();
        $tahun_akademik = TahunAkademik::all();
        return view('pages.admin.jadwal_praktek.add',compact('jadwals','matkuls','kelas','users','ruangan','tahun_akademik'));
    }
    public function addasdos(){
        $matkuls = Matkul::all();
        $jadwals = JadwalPraktikum::all();
        $users = User::all();
        $kelas = Kelas::all();
        $ruangan = Ruangan::all();
        $tahun_akademik = TahunAkademik::all();
        return view('pages.asdos.jadwal_praktek.add',compact('jadwals','ruangan','matkuls','kelas','users','tahun_akademik'));
    }

    public function store(Request $request){
        $jadwal = $request->all();
        JadwalPraktikum::create($jadwal);
        Alert::success('Data Jadwal Praktikum berhasil ditambahkan','Data Berhasil ditambah!');
        return redirect('/admin/jadwal-praktikum');
    }
    public function storeasdos(Request $request){
        $jadwal = $request->all();
        JadwalPraktikum::create($jadwal);
        Alert::success('Data Jadwal Praktikum berhasil ditambahkan','Data Berhasil ditambah!');
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
    
    public function search_by_date(Request $request)
	{
		// menangkap data pencarian
		$search = $request->hari_search;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$jadwals = JadwalPraktikum::where('hari','like',"%".$search."%")
		->paginate(5);
 
    		// mengirim data pegawai ke view index
		return view('pages.admin.jadwal_praktek.index',['jadwals' => $jadwals]);
 
	}
    public function search_by_tahun_akademik(Request $request)
	{
		// menangkap data pencarian
		$search = $request->tahun_akademik_search;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$jadwals = JadwalPraktikum::where('tahun_akademik_id','like',"%".$search."%")
		->paginate(5);
 
    		// mengirim data pegawai ke view index
		return view('pages.admin.jadwal_praktek.index',['jadwals' => $jadwals]);
 
	}

}
