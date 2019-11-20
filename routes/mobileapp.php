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

  Route::get( '/items/get/shop_id/{shop_id}/sub_cat_id/{product_cat}/item/all/count/{pagination}/form/0', [
    'uses' => 'MobileAppFrontendController@multivendorStoreSinglePageProductsCatContent'
  ]);
  
  
});
