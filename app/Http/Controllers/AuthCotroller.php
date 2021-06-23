<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class AuthCotroller extends Controller
{
    //

    public function registerasdos()
    {
    	return view('pages.applicant.register');
    }
      public function registerapplicant(Request $data)
    {
        $tambahdata = ([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'rules' => $data['role'],
            'password' => bcrypt($data['password']),
        ]);
        User::create($tambahdata);
        return redirect('/');
    
    }
}
