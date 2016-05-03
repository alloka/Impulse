<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TwitterController extends Controller
{
    //

    public function index() {

    	$tweets =  \Twitter::getHomeTimeline(['count' => 1, 'format' => 'json']);

    	$tweets = json_decode($tweets,true);
    	
    	return view('twitter.index', compact('tweets'));
    	// json_last_error(); // 4 (JSON_ERROR_SYNTAX)
		//echo json_last_error_msg(); // unexpected character 

		 //return var_dump(json_decode($tweets, true));
    	 // print_r($tweet1['Array']['text'],true);
    	//return view('twitter.get_tweets', compact('tweets'));
    }
}
