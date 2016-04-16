<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TicketCommentsController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }
    
     public function create(Ticket $ticket)	{
        //return view('ticketcomments.create')->with('ticket', $ticket);
    }

    public function store(TicketCommentequest $request, Ticket $ticket){
        $Comment = new Comment;
        $Comment->text = $request->text;
        $Comment->ticket_id = $ticket->id;
        $Comment->user_id = Auth::user()->id;
        $Comment->save();
        //return Redirect::to('tickets');
    }

    public function destroy($id) {
        $data = \App\Comment::find($id);
        $data->delete();
        //Session::flash('message', 'Successfully deleted the ticket!');
        return Redirect::to('tickets');
    }
}
