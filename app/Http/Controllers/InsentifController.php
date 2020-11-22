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
}
