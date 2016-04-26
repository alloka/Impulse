<?php

namespace App\Http\Controllers;


//use Illuminate\Http\Request;

use App\Http\Requests;
use App\User; 
use Request;

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
    	//return "hello";
    	return view('users/newSupportAgent');
    }

    public function editSupportAgent($id){
    	$user = User::findOrFail($id);
    	return view('users/editSupportAgent');
    }

    public function newUser(){
    	$input = Request::All();
    	$user = new User; 
    	$user->username = $input['username']; 
    	$user->password = "pw"; 
    	$user->email = $input['email']; 
    	$user->type = $input['type'];
    	$user->save();
    	    	//User::create($input);
    	return redirect('users'); 
    }


    public function deleteUser($id){
    	$user =User::findOrFail($id);
    	$user->delete();
    	return redirect('users'); 
    }

    public function editUser($id){
    	$input = Request::All();
    	$$user =User::findOrFail($id);
    	$user->username = $input['username']; 
    	$user->email = $input['email']; 
    	$user->type = $input['type'];
    	$user->save();
    	return redirect('users'); 
    }


     public function editUser(){
    	$input = Request::All();
    	$user =User::findOrFail($id);
    	$user->username = $input['username']; 
    	$user->email = $input['email']; 
    	$user->type = $input['type'];
    	$user->save();
    	return redirect('users'); 
    }


    public function editTicket($id){
    	app('App\Http\Controllers\TicketsContoller')->edit($id);
    }

    public function addTicket($id){
    	app('App\Http\Controllers\TicketsContoller')->create();
    }

    public function deleteTicket($id){
    	app('App\Http\Controllers\TicketsContoller')->destroy($id);
    }

        public function editTicketStatus($id){
    	app('App\Http\Controllers\TicketsContoller')->editStatus($id);
    }

    public function addTicketStatus($id){
    	app('App\Http\Controllers\TicketsContoller')->addStatus();
    }

    public function deleteTicketStatus($id){
    	app('App\Http\Controllers\TicketsContoller')->deleteStatus($id);
    }

    public function editTicketPriority($id){
    	app('App\Http\Controllers\TicketsContoller')->editPriority();
    }


    public function claimTicket(){
    	$input= Request::All(); 
    	$user = User::findOrFail($input['userId']); 
    	$ticket = Ticket::findOrFail($input['ticketId']); 
    	$ticketAgent = new TicketAgent; 
    	$ticketAgent->ticket_id = $input['userId'];
    	$ticketAgent->user_id = $input['userId'];
    	$ticketAgent->notify =0; 
    	$ticketAgent->save();
    }

      public function replyTicket(){
    	$input= Request::All(); 
    	$user = User::findOrFail($input['userId']); 
    	$ticket = Ticket::findOrFail($input['ticketId']); 
    	$reply = new Comment; 
    	$reply->ticket_id = $input['userId'];
    	$reply->user_id = $input['userId'];
    	$reply->text = $input['text'];
    	$ticketAgent->save();
    }


    public function editTicketStatus($id){

    }

}
