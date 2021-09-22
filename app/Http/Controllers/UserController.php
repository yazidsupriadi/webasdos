<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Asdos;
use App\Exports\AsdosExport;
use App\Exports\CalonAsdosExport;
use Maatwebsite\Excel\Facades\Excel;
use App\HistoryAsdos;
use Alert;
class UserController extends Controller
{
    //
    public function index(){
        $users = User::paginate(10);
        return view('pages.admin.user.index',compact('users'));
    }

    
    public function asdos(){
        $users = User::where('rules','asdos')->paginate(10);
        return view('pages.admin.user.asdos',compact('users'));
    }
    
    public function profileasdos($id){
        $user = User::where('id','=',$id)->get();
        $asdos = Asdos::where('user_id','=',$id)->get();
        $history_asdos = HistoryAsdos::where('user_id','=',$id)->get();
        return view('pages.asdos.asdos.profile',compact('asdos','user','history_asdos'));
    }

    public function daftarasdos(){
        $users = User::where('rules','applicant')->paginate(10);
        return view('pages.admin.user.caasdos',compact('users'));
    }
    public function dataasdos(){
        $users = User::where('rules','asdos')->paginate(10);
        return view('pages.admin.user.asdos',compact('users'));
    }




    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/user');
    }

    public function makeadmin($id)
    {
        $users = User::find($id);
        if($users->rules == 'asdos'){
            $change_status = 'admin';
            
        Alert::success('User berhasil diubah menjadi admin','Data Berhasil diubah!');
        }
        else {
            $change_status = 'asdos';
            
        Alert::success('User berhasil diubah menjadi bukan admin','Data Berhasil diubah!');
        }

        User::where('id',$id)->update(['rules' => $change_status]); 
        return redirect('admin/user');
    }

    public function makeasdos($id)
    {
        $users = User::find($id);
        if($users->rules == 'applicant'){
            $change_status = 'asdos';
            Alert::success('User berhasil diubah menjadi Asisten Dosen','Data Berhasil diubah!');
        }
        else {
            $change_status = 'applicant';
            Alert::success('User berhasil diubah menjadi Pendaftar','Data Berhasil diubah!');
        }

        User::where('id',$id)->update(['rules' => $change_status]);
        return redirect('admin/applicant');
    }

    public function export_excel()
	{
		return Excel::download(new AsdosExport, 'asdos-data-master.xlsx');
	}
    public function export_applicant_excel()
	{
		return Excel::download(new CalonAsdosExport, 'calon-asdos-data-master.xlsx');
	}

    public function update_status_matkul($id)
    {
        $history_asdos = HistoryAsdos::find($id);
        if($history_asdos->status == 'active'){
            $change_status = 'inactive';
            Alert::success('Status Asistensi Berhasil Diubah','Data Berhasil diubah!');
        }
        else {
            $change_status = 'active';
            Alert::success('Status Asistensi Berhasil Diubah','Data Berhasil diubah!');
        }

        HistoryAsdos::where('id',$id)->update(['status' => $change_status]);
        return redirect()->back();
    }

    public function daftar_asistensi(){
        $daftar_asistensi_aktif = HistoryAsdos::where('status','=','active')->paginate(10);
        return view('pages.admin.user.daftar_asistensi',compact('daftar_asistensi_aktif'));     
    }



}
