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
    }

    public function edit() {

    }

    public function markTweet($tweet_text) {
        

    }
}
