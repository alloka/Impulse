<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Ticket;

class TicketsController extends Controller
{

    //public function __construct() {
    //    $this->middleware('auth');
   // }

    public function index() {
        $tickets = Ticket::with('comments')->all();
        return view('tickets.index', compact('tickets'));
    }

    public function create() {
        return view('tickets.create');
    }

	public function show($id)
    {
        $ticket = Ticket::find($id);
        return view('tickets.show', compact('ticket','users'));
    }

     public function store() {
        $input = Request::all();
        //return $input;
        Ticket::create($input);

         $ticket->save();
        return redirect('tickets');
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

     public function destroy($id) {
        $data = Ticket::find($id);
        $data->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the ticket!');
        return Redirect::to('tickets');
    }

}
