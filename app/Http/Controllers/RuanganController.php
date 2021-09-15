<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;
use App\Exports\RuanganExport;
use Maatwebsite\Excel\Facades\Excel;
use Alert;
class RuanganController extends Controller
{
    //
    public function index(){
        $ruangans = Ruangan::paginate(10);
        return view('pages.admin.ruangan.index',compact('ruangans'));
    }
    public function asdosindex(){
        $ruangans = Ruangan::paginate(10);
        return view('pages.asdos.ruangan.index',compact('ruangans'));
    }
 
    public function add(){
        return view('pages.admin.ruangan.add');
    }
    public function store(Request $request){
        $ruangan = $request->all();
        Ruangan::create($ruangan);
        Alert::success('Data Ruangan Berhasil Ditambahkan','Data Berhasil ditambahkan!'); 
        return redirect('/admin/ruangan');
    }

    public function edit($id){
        $ruangan = Ruangan::find($id);
        return view('pages.admin.ruangan.edit',compact('ruangan'));

    }  
    public function update(Request $request, $id)
    {
        //
        $ruangan = $request->all();
        $item = ruangan::findOrFail($id);
         $item->update($ruangan);
         Alert::success('Data Ruangan Berhasil Diupdate','Data Berhasil diupdate!'); 
        return redirect('/admin/ruangan');
    
    }
    
    public function delete($id){
        $ruangan = Ruangan::find($id);
        $ruangan->delete();
        
        Alert::success('Data Ruangan Berhasil Dihapus','Data Berhasil dihapus!'); 
        return redirect()->back();
    }

    
    public function search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$ruangans = Ruangan::where('kode_ruangan','like',"%".$search."%")
        ->orWhere('nama_ruangan','like','%'.$search."%")
		->paginate(5);
 
    		// mengirim data pegawai ke view index
		return view('pages.admin.ruangan.index',['ruangans' => $ruangans]);
 
	}
    public function export_excel()
	{
		return Excel::download(new RuanganExport, 'ruangan-data-master.xlsx');
	}
}
