<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Exports\KelasExport;
use Maatwebsite\Excel\Facades\Excel;
use Alert;
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
        Alert::success('Data Kelas Berhasil Ditambahkan','Data Berhasil ditambahkan!');
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
         
        Alert::success('Data Kelas Berhasil Diupdate','Data Berhasil diupdate!');
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
    public function export_excel()
	{
		return Excel::download(new KelasExport, 'kelas.xlsx');
	}
}
