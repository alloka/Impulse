<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\User; 

class UserController extends Controller
{

    public function index(){
    	return  User::all();
    }

     public function getUser($id){
    	return $user =  User::findOrFail($id);
    	//return $user; 
    }

    public function newSupportAgent(){
    	return view('users/newSupportAgent');
    }
}
