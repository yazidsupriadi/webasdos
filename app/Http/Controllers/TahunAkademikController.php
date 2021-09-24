<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TahunAkademik;
use Alert;
class TahunAkademikController extends Controller
{
    //
    public function index(){
        $tahun_akademik = TahunAkademik::paginate(5);
        return view('pages.admin.tahun_akademik.index',compact('tahun_akademik'));
    }

    public function add(){
        return view('pages.admin.tahun_akademik.add');
    }

    public function store(Request $request){
        $tahun_akademik = $request->all();
        TahunAkademik::create($tahun_akademik);
        Alert::success('Data Tahun Akademik Berhasil Ditambahkan','Data Berhasil ditambahkan!'); 
        return redirect('/admin/tahun-akademik');
    }

    
    public function delete($id){
        $tahun_akademik = TahunAkademik::find($id);
        $tahun_akademik->delete();
        Alert::success('Data Tahun Akademik Berhasil Dihapus','Data Berhasil dihapus!');
        return redirect()->back();
    }
  
    public function edit($id){
        $tahun_akademik = TahunAkademik::find($id);
        return view('pages.admin.tahun_akademik.edit',compact('tahun_akademik'));

    }  
  
    public function update(Request $request, $id)
    {
        //
        $tahun_akademik = $request->all();
        $item = TahunAkademik::findOrFail($id);
         $item->update($tahun_akademik);
         Alert::success('Data Tahun Akademik Berhasil Diupdate','Data Berhasil diupdate!'); 
        return redirect('/admin/tahun-akademik');
    
    }

    public function tahun_search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$tahun_akademik = TahunAkademik::where('kode_tahun_akademik','like',"%".$search."%")
        ->orWhere('tahun','like','%'.$search."%")
		->paginate(5);
 
    		// mengirim data pegawai ke view index
		return view('pages.admin.tahun_akademik.index',['tahun_akademik' => $tahun_akademik]);
 
	}

   
}
