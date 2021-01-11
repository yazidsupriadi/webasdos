<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gaji;
use Auth;
class GajiController extends Controller
{
    //

    public function index(){
        $gajis = Gaji::all();
        return view('pages.admin.gaji.index',compact('gajis'));
    }

    public function asdosindex(){
       
        $gajis = Auth::user()->gaji()->get();
        return view('pages.asdos.gaji.index',compact('gajis'));
        
    }
}
