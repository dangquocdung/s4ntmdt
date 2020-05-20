<?php

namespace dungthinh\Http\Controllers\Mail;

use Illuminate\Http\Request;

use dungthinh\Http\Controllers\Controller;


class SendFeedBackController extends Controller
{
    function index() {

    	return view('sendfeedback');

    }

}
