<?php

/*
|--------------------------------------------------------------------------
| Mobile App Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Mobile app route

Route::group(['prefix' => 'rest', 'namespace' => 'MobileApp'], function () {

  Route::get( '/shops/get', [
    'uses' => 'MobileAppFrontendController@multivendorStoreListPageContent'
  ]);

  Route::get( '/shops/get/id/{id}', [
    'uses' => 'MobileAppFrontendController@singlevendorStoreListPageContent'
  ]);


  Route::get( '/items/get/shop_id/{shop_id}/sub_cat_id/{product_cat}/item/all/count/{limit}/from/{offset}', [
    'uses' => 'MobileAppFrontendController@multivendorStoreSinglePageProductsCatContent'
  ]);

  Route::get( '/items/get/id/{id}/shop_id/{shop_id}', [
    'uses' => 'MobileAppFrontendController@productSinglePageContent'
  ]);

  Route::post( '/items/touch/id/{id}', [
    'uses' => 'MobileAppFrontendController@productSinglePageContent'
  ]);


  
  
});
