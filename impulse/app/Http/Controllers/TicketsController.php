<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TicketsController extends Controller
{



	public function create() 
	{
        return();
    }


    public function index()
    {
    	$tickets = \App\Ticket::all();
    	return();
    }

	public function show($id)
    {
    	$tickets = \App\Ticket::find($id);
    	return $tickets;
    	if (is_null($tickets))
    	{
    		return();
    	}
    }

    public function edit($id) 
    {
        $ticket = Ticket::findOrFail($id);
    }

    public function store() 
    {

    }

    public function destroy($id) {
        
    }

}
