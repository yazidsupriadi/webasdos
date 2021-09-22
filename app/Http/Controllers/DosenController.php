<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\Exports\DosenExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Alert;
class DosenController extends Controller
{
    //
    public function index(){

        $dosens = Dosen::paginate(10);
        return view('pages.admin.dosen.index',compact('dosens'));
    

    }
    public function add(){

        return view('pages.admin.dosen.add');
    

    }

    
    public function search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$dosens = Dosen::where('nama','like',"%".$search."%")
        ->orWhere('nidn','like','%'.$search."%")
		->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('pages.admin.dosen.index',['dosens' => $dosens]);
 
	}

    public function store(Request $request){
        $dosen = $request->all();
        Dosen::create($dosen);
        Alert::success('Data Dosen Berhasil Ditambahkan','Data Berhasil ditambahkan!');
        return redirect('/admin/dosen');
    }

    public function edit($id){
        $dosen = Dosen::findOrFail($id);
        return view('pages.admin.dosen.edit',compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        //
        $dosen = $request->all();
        $item = Dosen::findOrFail($id);
         $item->update($dosen);
         Alert::success('Data Dosen Berhasil Diupdate','Data Berhasil diupdate!'); 
        return redirect('/admin/dosen');
    
    }
    public function delete($id){
        $dosen = Dosen::find($id);
        $dosen->delete();
        Alert::success('Data Dosen Berhasil Dihapus','Data Berhasil dihapus!');
        return redirect()->back();
    }


    public function export_excel()
	{
		return Excel::download(new DosenExport, 'dosen.xlsx');
	}
}
