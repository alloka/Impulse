<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Request;
use App\Http\Requests;






class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */

    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(){
     // dd( Request::All());
      $request = Request::All();
      $password = $request['password']; 
      $username = $request['username']; 
      if (Auth::attempt(['username' => $username, 'password' => $password])) {
           return redirect('alloka'); 
        }
        else{
           echo "Username or password incorrect.";
        }
    }

    public function getLogout(){
        Auth::logout();
    }

   
}