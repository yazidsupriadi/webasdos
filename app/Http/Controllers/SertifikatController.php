<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Sertifikat;
use App\Exports\SertifikatExport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
class SertifikatController extends Controller
{
    //
    public function index(){
        $sertifikats = Sertifikat::paginate(10);
        return view('pages.admin.sertifikat.index',compact('sertifikats'));
    }

    public function add(){
        $users = User::where('rules','=','asdos')->get();
        return view('pages.admin.sertifikat.add',compact('users'));
    }
    public function store(Request $request){
        $sertifikat = $request->all();
        Sertifikat::create($sertifikat);
       
        return redirect('/admin/sertifikat');
    }

    public function downloadsertifikat($file){

        return Storage::disk('local')->download('public/'.$file);
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
    public function export_excel()
	{
		return Excel::download(new SertifikatExport, 'sertifikat-data-master.xlsx');
	}
    


}
