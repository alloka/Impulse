<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Ticket;
use App\Customer;

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
        return view('tickets.show', compact('ticket','users'));
    }

     public function store() {
        $input = Request::all();
        $input["status"] = 0;
        Ticket::create($input);
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

     public function destroy($id) {
        dd("adeek");
        $data = Ticket::find($id);
        $data->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the ticket!');
        return Redirect::to('tickets');
    }



}
