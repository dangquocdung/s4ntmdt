<?php

namespace shopist\Http\Controllers\Mail;

use Illuminate\Http\Request;

use shopist\Http\Controllers\Controller;


class SendFeedBackController extends Controller
{
    function index() {

    	return view('sendfeedback');

    }

}
