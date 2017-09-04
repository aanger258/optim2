<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{

    public function login( Request $request ){
    	$data = $request->all();	
    	$username = $data['username'];
    	$password = $data['password'];

		if (Auth::attempt(['username' => $username, 'password' => $password, 'status' => 1])) {
            session(['user' => User::find(Auth::id())]);
            return redirect('/admin/home');
        }

        else {
        	$error = 'Invalid username, password or disabled account';
        	return view('login')->with('error',$error);
        }

    }

    public function logout(Request $request){

        Auth::logout();

        return redirect('/admin/login');

    }
}
