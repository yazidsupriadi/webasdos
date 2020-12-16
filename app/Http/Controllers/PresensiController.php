<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presensi;
class PresensiController extends Controller
{
    //
    public function index(){
        $presensis = Presensi::all();
        return view('pages.admin.presensi.index',compact('presensis'));
    }
}
