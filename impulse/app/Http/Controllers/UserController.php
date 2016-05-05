<?php

namespace App\Http\Controllers;

use Hash;
//use Illuminate\Http\Request;

use App\Http\Requests;
use App\User; 
use Request;
use App\Ticket;
use App\TicketAgent;
use Auth;
use Carbon\Carbon;
use DB;

class UserController extends Controller
{

     public function __construct() {
       $this->middleware('auth');
    }

    public function create(){
        return view('users/newSupportAgent');
    }

    public function store(){


    }

    public function edit($id){
        $user = User::find($id);
        //var_dump($user);
        return view('users.editSupportAgent', compact('user'));
    }
    public function index() {
        $users= User::All();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {   
        $user = User::find($id);
        $ticket_ticket_agent = DB::table('tickets')->join('ticket_agent', 'tickets.id', '=', 'ticket_agent.ticket_id');
        $numberOfOpen = $ticket_ticket_agent->where('status', 'open')->where('user_id', $id)->count();
        $close = $ticket_ticket_agent->where('status', 'close')->where('user_id', $id)->count();
        return view('users.userSpecific',compact('close','user','numberOfOpen'));
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
    	$user->password = Hash::make($input['password']);
    	$user->email = $input['email']; 
    	$user->type = $input['type']; 
        $user->supervisor_id = $input['supervisor'];
    	$user->save();
    	    	//User::create($input);
    	return redirect('users'); 
    }


    public function deleteUser($id){
    	$user =User::findOrFail($id);
    	$user->delete();
    	return redirect('users'); 
    }


    public function destroy() {
        //dd(Request::All());
        //$ticket = Ticket::find(Request::"ticket"]);
        //dd($ticket);
        $request = Request::All();
       // echo $request['id'];
        $id = $request['id'];
        $users= User::where('supervisor_id', $id)->get();
        foreach ($users as $user)
            {
               $user->supervisor_id = null;
               $user->save();
            }
       User::find($id)->delete();
       return redirect(action("UserController@index"));
}
      
    

    public function editUser($id){
    	$input = Request::All();
       // var_dump($input);
    	$user = User::findOrFail($id);
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

    public function assignTicket(){
       $ticket_id = Request::All()['ticket_id'];
       echo "IDDD ".$ticket_id;
        //Request::All();

        $users = User::lists("username",'id');

        return view('users.assignTicket', compact('users', 'ticket_id'));
    }

    public function assign($ticket_id){
      //  var_dump($ticket_id); 
        //var_dump(Request::All()); 
       // echo $id;
    }

    public function claimTicket(){

    	$input= Request::All(); 
        if(TicketAgent::where('ticket_id', $input['ticketId'])->where('user_id', Auth::user()->id)->count()>0){
            echo "already claimed";
            return redirect()->back();
        }
        $ticket_ticket_agent = DB::table('tickets')->join('ticket_agent', 'tickets.id', '=', 'ticket_agent.ticket_id');
        $numberOfOpen = $ticket_ticket_agent->where('status', 'open')->where('user_id', Auth::user()->id)->count();
        if($numberOfOpen==3){
            echo 'maximum number of tickets reached'; 
           return redirect()->back();
         }

        $numberOfAgents = TicketAgent::where('ticket_id', $input['ticketId'])->count();
        if($numberOfAgents==3){
            echo 'maximum number of users assigned to ticket';
           return redirect()->back();

        }
    	$ticket = Ticket::findOrFail($input['ticketId']); 
    	$ticketAgent = new TicketAgent; 
    	$ticketAgent->ticket_id = $ticket->id;
    	$ticketAgent->user_id = Auth::user()->id;
    	$ticketAgent->notify =0; 
        $ticketAgent->save();
        return redirect()->back();
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

}
