<?php

namespace App\Http\Controllers;

class DashboardController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   // public function __construct() {
     //   $this->middleware('auth');
    //}

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index() {
        $clients = \DB::table('customers')->count();
        $open_tickets = \DB::table('tickets')->where('status', '0')->count();
        
        return view('dashboard.index', compact('clients', 'open_tickets'));
    }

}
