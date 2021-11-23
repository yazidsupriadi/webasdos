<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gaji;
use DB;
use Auth;
use App\User;
use App\Asdos;
use App\Presensi;
use App\Exports\GajiExport;
use App\Exports\GajiAsdosExport;
use Maatwebsite\Excel\Facades\Excel;
class GajiController extends Controller
{
    //

    public function asdos_honor(){
        $users = User::where('rules','asdos')->paginate(10);
        return view('pages.admin.gaji.honor_asdos',compact('users'));
    }

    public function index(){
        $gajis = Gaji::all();
        return view('pages.admin.gaji.index',compact('gajis'));
    }

    
    public function detailgaji($id){
        
        $asdos = Asdos::where('user_id','=',$id)->get();


        $user = User::where('id','=',$id)->get();

        $gajis = Gaji::where('user_id','=',$id)->orderby('created_at','desc')->get();

        $total_gajis = DB::select('select year(created_at) as year, month(created_at) as month, sum(total) as total_amount from gaji where gaji.user_id = ? group by year(created_at), month(created_at) order by created_at DESC',array($id));
      
        return view('pages.admin.gaji.index',compact('gajis','total_gajis','asdos','user'));
        
    }

    public function updatestatusgaji($id)
    {
        $gajis = Gaji::find($id);
        if($gajis->paid == 'N'){
            $change_status = 'Y';
        }
        else {
            $change_status = 'N';
        }

        Gaji::where('id',$id)->update(['paid' => $change_status]);
        return redirect()->back();
    }
    public function asdosindex(){
       
        $gajis = Gaji::where('user_id','=',Auth::user()->id)->orderby('created_at','desc')->paginate(10);
        $total_gajis = DB::select('select year(created_at) as year, month(created_at) as month, sum(total) as total_amount from gaji where gaji.user_id = ?  group by year(created_at), month(created_at) order by created_at DESC',array(Auth::user()->id));
      
        return view('pages.asdos.gaji.index',compact('gajis','total_gajis'));
        
    }
    
    public function asdosgajipaid(){
       
        $gajis = Gaji::where('user_id','=',Auth::user()->id)->where('status','=','accepted')->where('paid','=','Y')->orderby('created_at','desc')->paginate(10);
        $total_gajis = DB::select('select year(created_at) as year, month(created_at) as month, sum(total) as total_amount from gaji where gaji.user_id = ? and gaji.status = "accepted" and gaji.paid = "Y" group by year(created_at), month(created_at) order by year(created_at), month(created_at) ASC',array(Auth::user()->id));
        return view('pages.asdos.gaji.gajipaid',compact('gajis','total_gajis'));
        
    }
    
    public function detailpresensi($id){
       
        $gajis = Gaji::where('user_id','=',Auth::user()->id)->where('status','=','accepted')->where('paid','=','Y')->paginate(10);
        $total_gajis = DB::select('select year(created_at) as year, month(created_at) as month, sum(total) as total_amount from gaji where gaji.user_id = ? and gaji.status = "accepted" and gaji.paid = "Y" group by year(created_at), month(created_at)',array(Auth::user()->id));
        $presensi = Presensi::join('gaji', 'gaji.presensi_id', '=','presensi.id')->where('gaji.presensi_id','=',$id)->get();

        return view('pages.asdos.gaji.test',compact('gajis','total_gajis','presensi'));
        
    }
    public function admindetailpresensi($id){
       
        $gajis = Gaji::where('user_id','=',Auth::user()->id)->where('status','=','accepted')->where('paid','=','Y')->paginate(10);
        $total_gajis = DB::select('select year(created_at) as year, month(created_at) as month, sum(total) as total_amount from gaji where gaji.user_id = ? and gaji.status = "accepted" and gaji.paid = "Y" group by year(created_at), month(created_at)',array(Auth::user()->id));
        $presensi = Presensi::join('gaji', 'gaji.presensi_id', '=','presensi.id')->where('gaji.presensi_id','=',$id)->get();

        return view('pages.asdos.gaji.test',compact('gajis','total_gajis','presensi'));
        
    }

    public function export_excel(Request $request)
	{
		return Excel::download(new GajiExport($request->tahun,$request->bulan), 'honor data bulan '.$request->bulan.' tahun '.$request->tahun.'.xlsx');
	}
    public function export_excel_asdos(Request $request,$id)
	{
        
        $user = User::where('id','=',$id)->get();
		return Excel::download(new GajiExport($request->tahun,$request->bulan,$id),'honor data bulan '.$request->bulan.' tahun '.$request->tahun.'.xlsx');
	}
}
