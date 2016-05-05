<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\CustomerRequest;

use App\Customer;

use App\Ticket;

class CustomerController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   // public function __construct() {
     //   $this->middleware('auth');
    //}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('customers.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CustomerRequest $request) {
        $input = $request->all();

        Customer::create($input);

        return redirect('alloka');
    }

    public function index() {
        $clients = Customer::all();

        return view('customers.index', compact('clients'));
    }

    public function show($id) {
        $client = Customer::find($id);

        return view('customers.show', compact('client'));
    }

}
