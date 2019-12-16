<?php

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//API frontend route

Route::group(['prefix' => 'api', 'namespace' => 'Frontend'], function () {

    Route::get('/thanh-toan', [
    'uses' => 'APIFrontendManagerController@checkoutPageContent',
    'as'   => 'api-checkout-page'
    ]);


});

Route::group(['namespace' => 'Mail'], function () {



	//Method GET Request
	Route::get('/send/mail/feedback', 'ApiSendMailController@send_feedback')->name('api.send.feedback');

	//Method POST Request
	Route::post('/send/mail/feedback', 'ApiSendMailController@send_feedback')->name('api.send.feedback');

    //You Can Add more Method Request
    
});
	
