<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;

class KelasController extends Controller
{
    //
    public function index(){
        $kelass = Kelas::paginate(5);
        return view('pages.admin.kelas.index',compact('kelass'));
    }
    public function asdosindex(){
        $kelass = Kelas::paginate(5);
        return view('pages.asdos.kelas.index',compact('kelass'));
    }
 
    public function add(){
        return view('pages.admin.kelas.add');
    }
    public function store(Request $request){
        $kelas = $request->all();
        Kelas::create($kelas);
        return redirect('/admin/kelas');
    }

    public function edit($id){
        $kelas = Kelas::find($id);
        return view('pages.admin.kelas.edit',compact('kelas'));

    }  
    public function update(Request $request, $id)
    {
        //
        $kelas = $request->all();
        $item = Kelas::findOrFail($id);
         $item->update($kelas);
        return redirect('/admin/kelas');
    
    }
    
    public function delete($id){
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect()->back();
    }
    
    public function kode_search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->kode_search;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$kelass = Kelas::where('kode_kelas','like',"%".$search."%")
		->paginate(5);
 
    		// mengirim data pegawai ke view index
		return view('pages.admin.kelas.index',['kelass' => $kelass]);
 
	}

    public function prodi_search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->prodi_search;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$kelass = Kelas::where('prodi','like',"%".$search."%")
		->paginate(5);
 
    		// mengirim data pegawai ke view index
		return view('pages.admin.kelas.index',['kelass' => $kelass]);
 
	}

    public function tahun_akademik_search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->tahun_akademik_search;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$kelass = Kelas::where('tahun_akademik','like',"%".$search."%")
		->paginate(5);
 
    		// mengirim data pegawai ke view index
		return view('pages.admin.kelas.index',['kelass' => $kelass]);
 
	}
}
