<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;
class RuanganController extends Controller
{
    //
    public function index(){
        $ruangans = Ruangan::paginate(5);
        return view('pages.admin.ruangan.index',compact('ruangans'));
    }
    public function asdosindex(){
        $ruangans = Ruangan::paginate(5);
        return view('pages.asdos.ruangan.index',compact('ruangans'));
    }
 
    public function add(){
        return view('pages.admin.ruangan.add');
    }
    public function store(Request $request){
        $ruangan = $request->all();
        Ruangan::create($ruangan);
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
        return redirect('/admin/ruangan');
    
    }
    
    public function delete($id){
        $ruangan = Ruangan::find($id);
        $ruangan->delete();
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
}
