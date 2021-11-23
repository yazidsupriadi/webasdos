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
use App\Exports\JadwalPraktikumExport;
use Maatwebsite\Excel\Facades\Excel;
class JadwalPraktikumController extends Controller
{
    //
    public function index(){
        $jadwals = JadwalPraktikum::where('status','=','active')->paginate(10);
        return view('pages.admin.jadwal_praktek.index',compact('jadwals'));
    }
    public function adminpendingindex(){
        $jadwals = JadwalPraktikum::where('status','=','pending')->paginate(10);
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
        Alert::success('Data Jadwal Praktikum Berhasil Dihapus','Data Berhasil dihapus!');
        return redirect()->back();
    }

    public function asdosindex(){
        $jadwals = Auth::user()->jadwal_praktek()->where('status','=','active')->get();
        return view('pages.asdos.jadwal_praktek.index',compact('jadwals'));
        
    }
    public function asdospendingindex(){
        $jadwals = Auth::user()->jadwal_praktek()->where('status','=','pending')->get();
        return view('pages.asdos.jadwal_praktek.index',compact('jadwals'));
        
    }
    
    public function search_by_date(Request $request)
	{
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$jadwals = JadwalPraktikum::where('hari','like',"%".$request->hari_search."%")
        ->where('tahun_akademik_id','like','%'.$request->tahun_akademik_search.'%')
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

    public function export_excel(Request $request)
	{
		return Excel::download(new JadwalPraktikumExport($request->tahun_akademik), 'jadwal-praktek.xlsx');
	}

    public function updatestatusjadwalpraktek($id)
    {
        $jadwals = JadwalPraktikum::find($id);
        if($jadwals->status == 'active'){
            $change_status = 'pending';
            Alert::success('Jadwal Praktikum pending','Data Berhasil diubah!');

        }
        else {
            $change_status = 'active';
            
            Alert::success('Jadwal Praktikum active','Data Berhasil diubah!');
        }

        JadwalPraktikum::where('id',$id)->update(['status' => $change_status]);
        return redirect()->back();
    }
}
