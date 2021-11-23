<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asdos;
use App\User;
use Auth;
use App\HistoryAsdos;
class AsdosController extends Controller
{
    //
    public function profile($id){
        $user = User::where('id','=',$id)->get();
        $asdos =  Auth::user()->asdos()->get();
        $history_asdos = HistoryAsdos::where('user_id','=',$id)->get();
        return view('pages.asdos.asdos.profile',compact('asdos','user','history_asdos'));
    }

    public function editprofile($id){
        
        $asdos =  Asdos::where('user_id','=',$id)->first();
        return view('pages.asdos.asdos.editprofile',compact('asdos'));
    }

    public function update(Request $request, $id)
    {
        //
        $asdos = $request->all();
        $item = Asdos::where('user_id','=',$id)->first();
         $item->update($asdos);
        return redirect('/asdos/profile/'.$id);
    
    }
    public function editphoto($id){
        $asdos =  Asdos::where('user_id','=',$id)->first();
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
