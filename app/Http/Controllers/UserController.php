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

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/user');
    }
}
