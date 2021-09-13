<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insentif;
class InsentifController extends Controller
{
    //
    public function index(){
        $insentifs = Insentif::all();
        return view('pages.admin.insentif.index',compact('insentifs'));
    }

    public function add(){
        return view('pages.admin.insentif.add');

    }
    public function store(Request $request){
        $insentif = $request->all();
        Insentif::create($insentif);
        return redirect('/admin/insentif');

    }
    
    public function edit($id){
        $insentif = Insentif::find($id);
        return view('pages.admin.insentif.edit',compact('insentif'));

    }  
    public function update(Request $request, $id)
    {
        //
        $insentif = $request->all();
        $item = Insentif::findOrFail($id);
         $item->update($insentif);
        return redirect('/admin/insentif');
    
    }

    public function delete($id){
        $insentif = Insentif::find($id);
        $insentif->delete();
        return redirect()->back();
    }

    
    public function tipe_insentif_search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->tipe_insentif_search;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$insentifs = Insentif::where('tipe_insentif','like',"%".$search."%")
		->paginate(5);
 
    		// mengirim data pegawai ke view index
		return view('pages.admin.insentif.index',['insentifs' => $insentifs]);
 
	}

    public function tahun_akademik_search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->tahun_akademik_search;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$insentifs = Insentif::where('tahun_akademik','like',"%".$search."%")
		->paginate(5);
 
    		// mengirim data pegawai ke view index
		return view('pages.admin.insentif.index',['insentifs' => $insentifs]);
 
	}
}
