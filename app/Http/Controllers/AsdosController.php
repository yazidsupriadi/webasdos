<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asdos;
use Auth;
class AsdosController extends Controller
{
    //
    public function profile($id){
        $asdos =  Auth::user()->asdos()->get();
        return view('pages.asdos.asdos.profile',compact('asdos'));
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

}
