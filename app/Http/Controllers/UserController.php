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
}