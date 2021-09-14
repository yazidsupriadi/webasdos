<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matkul;
use App\Dosen;
use App\Exports\MatkulExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Alert;
class MatkulController extends Controller
{
    //
    public function index(){
        $matkuls = Matkul::orderBy('nama')->paginate(4);
        return view('pages.admin.matkul.index',compact('matkuls'));
    }

    public function asdosindex(){
        $matkuls = Matkul::orderBy('nama')->paginate(4);
        return view('pages.asdos.matkul.index',compact('matkuls'));
    }

    public function add(){
        $dosens = Dosen::all();
        return view('pages.admin.matkul.add',compact('dosens'));
    


    }
    public function search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$matkuls = Matkul::where('nama','like',"%".$search."%")
        ->orWhere('kodemk','like','%'.$search."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('pages.admin.matkul.index',['matkuls' => $matkuls]);
 
	}

    public function store(Request $request){
        $matkul = $request->all();
        Matkul::create($matkul);
        Alert::success('Data Mata Kuliah Berhasil Ditambahkan','Data Berhasil ditambahkan!'); 
        return redirect('/admin/matkul');
    }

    public function edit($id){
        $matkul = Matkul::find($id);
        
        $dosens = Dosen::all();
        return view('pages.admin.matkul.edit',compact('matkul','dosens'));
    }
    public function update(Request $request, $id)
    {
        //
        $matkul = $request->all();
        $item = Matkul::findOrFail($id);
         $item->update($matkul);
         Alert::success('Data Mata Kuliah Berhasil Diupdate','Data Berhasil diupdate!'); 
        return redirect('/admin/matkul');
    
    }

    public function delete($id){
        $matkul = Matkul::find($id);
        $matkul->delete();
        return redirect()->back();
    }

    public function export_excel()
	{
		return Excel::download(new MatkulExport, 'matkul.xlsx');
	}
}
