<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;

class KelasController extends Controller
{
    //
    public function index(){
        $kelass = Kelas::all();
        return view('pages.admin.kelas.index',compact('kelass'));
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
}
