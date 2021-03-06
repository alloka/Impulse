<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Ticket;
use App\Customer;
use App\Comment;
use App\TicketStatus;
use App\TicketAgent;


class TicketsController extends Controller
{

    //public function __construct() {
    //    $this->middleware('auth');
   // }

    public function index() {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function create() {
        $clients = Customer::lists("username",'id');
        return view('tickets.create',compact('clients'));
    }

	public function show($id)
    {
        $ticket = Ticket::find($id);
        return view('tickets.show', compact('ticket'));
    }

     public function store() {
        $input = Request::all();
        $input["status"] = TicketStatus::open;
        $ticket = Ticket::create($input);
        $ticket->text = $input["text"];
        $ticket->save();
        return redirect()->route("tickets.index");
    }

    public function editStatus($id) {
        $ticket = Ticket::find($id);
        //return view('tickets.edit', compact('ticket'));
    }

     public function addStatus($id) {
        $ticket = Ticket::find($id);
        //return view('tickets.edit', compact('ticket'));
    }

     public function deleteStatus($id) {
        $ticket = Ticket::find($id);
        //return view('tickets.edit', compact('ticket'));
    }

     public function editPriority($id) {
        $ticket = Ticket::find($id);
        //return view('tickets.edit', compact('ticket'));
    }
    public function edit($id) {
        $ticket = Ticket::find($id);
        return view('tickets.edit', compact('ticket'));
    }

    public function update($id, Request $request) {
        $ticket = Ticket::find($id);
        $ticket->update($request->all());
        $ticket->save();
        return redirect('tickets');
    }

     public function destroy() {
        //dd(Request::All());
        //$ticket = Ticket::find(Request::"ticket"]);
        //dd($ticket);
        $request = Request::all();

       TicketAgent::where('ticket_id',$request["ticket"])->delete();
       Comment::where('ticket_id',$request["ticket"])->delete();

      // dd($array);
        Ticket::find($request["ticket"])->delete();
        return redirect(action("TicketsController@index"));
    }

    public function close(){
          dd(Request::All());
        $request = Request::all();
        $ticket = Ticket::find($request["ticket"]);
        $ticket->status = TicketStatus::close;
        $ticket->save();
        return redirect()->back();
    }

    public function addComment(){
        $request = Request::all();
        $ticket = Ticket::find($request["ticket"]);
        $comment = new Comment(["text" => $request["text"]]);
        echo $ticket;
        $comment->user_id = 1;
        //$comment->user_id = Auth::user()->id;
        $comment->ticket_id = $ticket->id;
        $comment->save();
        return redirect()->back();

    }



}
