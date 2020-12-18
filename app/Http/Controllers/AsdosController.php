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
}
