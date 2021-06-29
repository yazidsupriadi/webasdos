<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('pages.admin.user.index',compact('users'));
    }

    
    public function asdos(){
        $users = User::where('rules','asdos')->get();
        return view('pages.admin.user.asdos',compact('users'));
    }

    public function daftarasdos(){
        $users = User::where('rules','applicant')->get();
        return view('pages.admin.user.asdos',compact('users'));
    }
    public function dataasdos(){
        $users = User::where('rules','asdos')->get();
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
        }
        else {
            $change_status = 'asdos';
        }

        User::where('id',$id)->update(['rules' => $change_status]);
        return redirect('admin/user');
    }

    public function makeasdos($id)
    {
        $users = User::find($id);
        if($users->rules == 'applicant'){
            $change_status = 'asdos';
        }
        else {
            $change_status = 'applicant';
        }

        User::where('id',$id)->update(['rules' => $change_status]);
        return redirect('admin/applicant');
    }

}
