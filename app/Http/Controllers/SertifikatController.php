<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Sertifikat;
use Auth;
class SertifikatController extends Controller
{
    //
    public function index(){
        $sertifikats = Sertifikat::paginate(3);
        return view('pages.admin.sertifikat.index',compact('sertifikats'));
    }

    public function add(){
        $users = User::where('rules','=','asdos')->get();
        return view('pages.admin.sertifikat.add',compact('users'));
    }
    public function store(Request $request){
        $sertifikat = $request->all();
        $sertifikat['sertifikat_file'] = $request->file('sertifikat_file')->store(
            'assets/sertifikat','public'
        );
        Sertifikat::create($sertifikat);
       
        return redirect('/admin/sertifikat');
    }

    public function downloadsertifikat($file){

        
        return response()->download(storage_path('public/assets/sertifikat/'.$file));
     }
     public function delete($id){
        $sertifikat = Sertifikat::find($id);
        $sertifikat->delete();
        return redirect()->back();
    }
    
    public function sertifikatasdos(){
        $sertifikats = Sertifikat::where('user_id','=',Auth::user()->id)->get();
        return view('pages.asdos.sertifikat.index',compact('sertifikats'));
    }


}
