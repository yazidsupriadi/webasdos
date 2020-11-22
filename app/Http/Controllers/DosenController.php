<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
class DosenController extends Controller
{
    //
    public function index(){

        $dosens = Dosen::all();
        return view('pages.admin.dosen.index',compact('dosens'));
    

    }
    public function add(){

        return view('pages.admin.dosen.add');
    

    }

    public function store(Request $request){
        $dosen = $request->all();
        Dosen::create($dosen);
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
        return redirect('/admin/dosen');
    
    }
    public function delete($id){
        $dosen = Dosen::find($id);
        $dosen->delete();
        return redirect()->back();
    }
}
