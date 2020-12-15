<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matkul;
use App\Dosen;
class MatkulController extends Controller
{
    //
    public function index(){
        $matkuls = Matkul::orderBy('nama')->get();
        return view('pages.admin.matkul.index',compact('matkuls'));
    }

    public function add(){
        $dosens = Dosen::all();
        return view('pages.admin.matkul.add',compact('dosens'));
    


    }
    

    public function store(Request $request){
        $matkul = $request->all();
        Matkul::create($matkul);
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
        return redirect('/admin/matkul');
    
    }

    public function delete($id){
        $matkul = Matkul::find($id);
        $matkul->delete();
        return redirect()->back();
    }
}
