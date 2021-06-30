<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gaji;
use DB;
use Auth;
use App\User;
use App\Asdos;
class GajiController extends Controller
{
    //

    public function asdos_honor(){
        $users = User::where('rules','asdos')->get();
        return view('pages.admin.gaji.honor_asdos',compact('users'));
    }

    public function index(){
        $gajis = Gaji::all();
        return view('pages.admin.gaji.index',compact('gajis'));
    }

    
    public function detailgaji($id){
        
        $asdos = Asdos::where('user_id','=',$id)->get();


        $user = User::where('id','=',$id)->get();

        $gajis = Gaji::where('user_id','=',$id)->get();

        $total_gajis = DB::select('select year(created_at) as year, month(created_at) as month, sum(total) as total_amount from gaji where gaji.user_id = ? group by year(created_at), month(created_at)',array($id));
      
        return view('pages.admin.gaji.index',compact('gajis','total_gajis','asdos','user'));
        
    }
    public function asdosindex(){
       
        $gajis = Auth::user()->gaji()->get();
        $total_gajis = DB::select('select year(created_at) as year, month(created_at) as month, sum(total) as total_amount from gaji group by year(created_at), month(created_at)');
      
        return view('pages.asdos.gaji.index',compact('gajis','total_gajis'));
        
    }
}
