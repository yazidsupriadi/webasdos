<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asdos;
use App\User;
use Auth;
class AsdosController extends Controller
{
    //
    public function profile($id){
        $user = User::where('id','=',$id)->get();
        $asdos =  Auth::user()->asdos()->get();
        return view('pages.asdos.asdos.profile',compact('asdos','user'));
    }

    public function editprofile($id){
        $asdos =  Asdos::find($id);
        return view('pages.asdos.asdos.editprofile',compact('asdos'));
    }

    public function update(Request $request, $id)
    {
        //
        $asdos = $request->all();
        $item = Asdos::findOrFail($id);
         $item->update($asdos);
        return redirect('/asdos/profile/'.$id);
    
    }
    public function editphoto($id){
        $asdos =  Asdos::find($id);
        return view('pages.asdos.asdos.editphoto',compact('asdos'));
    }

    
    public function updatephoto(Request $request, $id)
    {
        //
        $asdos = $request->all();
        $asdos['foto'] = $request->file('foto')->store(
            'assets/foto','public'
        );
        $item = Asdos::findOrFail($id);
        $item->update($asdos);
        return redirect('/asdos/profile/'.$id);
    
    }

}
