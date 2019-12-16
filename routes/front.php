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

//frontend route
Route::get( '/', [
  'uses' => 'Frontend\FrontendManagerController@homePageContent',
  'as'   => 'home-page'
]);

Route::get('/sendfeedback', 'Mail\SendFeedBackController@index');

Route::get( '/ban-quan-tri', [
  'uses' => 'Frontend\FrontendManagerController@aboutUs',
  'as'   => 'ban-quan-tri'
]);

Route::get( '/khuyen-mai-sap-toi', [
  'uses' => 'Frontend\FrontendManagerController@comingSoon',
  'as'   => 'khuyen-mai-sap-toi'
]);

Route::get( '/cac-san-pham', [
  'uses' => 'Frontend\FrontendManagerController@productsPageContent',
  'as'   => 'shop-page'
]);

Route::get( '/san-pham/chi-tiet/{details_slug}', [
  'uses' => 'Frontend\FrontendManagerController@productSinglePageContent',
  'as'   => 'details-page'
]);

Route::get( '/product/customize/{details_id}', [
  'uses' => 'Frontend\FrontendManagerController@designerSinglePageContent',
  'as'   => 'customize-page'
]);

Route::get( '/san-pham/danh-muc/{cat_slug}', [
  'uses' => 'Frontend\FrontendManagerController@productCategoriesSinglePageContent',
  'as'   => 'categories-page'
]);

Route::get('/gio-hang', [
  'uses' => 'Frontend\FrontendManagerController@cartPageContent',
  'as'   => 'cart-page'
]);

Route::get('/thanh-toan', [
  'uses' => 'Frontend\FrontendManagerController@checkoutPageContent',
  'as'   => 'checkout-page'
]);

Route::get( '/page/{page_slug}', [
  'uses' => 'Frontend\FrontendManagerController@singlePageContent',
  'as'   => 'custom-page-content'
]);

Route::post('/gio-hang', [
              'uses' => 'Frontend\FrontendManagerController@doActionFromCartPage',
              'as'   => 'cart-page-post'
]);

$router->get('/remove_item/{cart_id}', ['uses' => 'Frontend\FrontendManagerController@doActionForRemoveItem', 'as' => 'removed-item-from-cart']);
$router->get('/remove_compare_product/{product_id}', ['uses' => 'Frontend\FrontendManagerController@doActionForRemoveCompareProduct', 'as' => 'remove-compare-product-from-list']);

Route::post('/thanh-toan', [
  'uses' => 'CheckoutController@doCheckoutProcess',
  'as'   => 'checkout-process'
]);

$router->get( '/checkout/order-received/{order_id}/{order_key}', ['uses' => 'Frontend\FrontendManagerController@thankyouPageContent', 'as' => 'frontend-order-received'])->where('order_id', '[0-9]+');

// this is after make the payment, PayPal redirect back to your site
Route::get('/checkout/status', array(
  'as' => 'payment.status',
  'uses' => 'CheckoutController@getPaymentStatus',
));

Route::get( '/thuong-hieu/{brands_name}', [
  'uses' => 'Frontend\FrontendManagerController@brandSinglePageContent',
  'as'   => 'brands-single-page'
]);

Route::get( '/testimonial/{testimonial_slug}', [
  'uses' => 'Frontend\FrontendManagerController@testimonialSinglePageContent',
  'as'   => 'testimonial-single-page'
]);

Route::get( '/truyen-thong', [
  'uses' => 'Frontend\FrontendManagerController@blogsPageContent',
  'as'   => 'blogs-page-content'
]);

Route::get( '/gian-hang', [
  'uses' => 'Frontend\FrontendManagerController@multivendorStoreListPageContent',
  'as'   => 'store-list-page-content'
]);

Route::get( '/gian-hang/chi-tiet/trang-chu/{store_user_name}', [
  'uses' => 'Frontend\FrontendManagerController@multivendorStoreSinglePageHomeContent',
  'as'   => 'store-details-page-content'
]);

Route::get( '/gian-hang/chi-tiet/san-pham/{store_user_name}', [
  'uses' => 'Frontend\FrontendManagerController@multivendorStoreSinglePageProductsContent',
  'as'   => 'store-products-page-content'
]);

Route::get( '/gian-hang/chi-tiet/danh-gia/{store_user_name}', [
  'uses' => 'Frontend\FrontendManagerController@multivendorStoreSinglePageReviewContent',
  'as'   => 'store-reviews-page-content'
]);

Route::post( '/gian-hang/chi-tiet/danh-gia/{store_user_name}', [
  'uses' => 'VendorsController@saveVendorComments',
  'as'   => 'vendor-reviews-save'
]);

Route::get( '/gian-hang/chi-tiet/danh-muc/san-pham/{product_cat}/{store_user_name}', [
  'uses' => 'Frontend\FrontendManagerController@multivendorStoreSinglePageProductsCatContent',
  'as'   => 'store-products-cat-page-content'
]);

Route::get( '/truyen-thong/{blog_slug}', [
  'uses' => 'Frontend\FrontendManagerController@blogSinglePageContent',
  'as'   => 'blog-single-page'
]);

Route::get( '/chuyen-muc/truyen-thong/{blog_cat_slug}', [
  'uses' => 'Frontend\FrontendManagerController@blogCategoriesPageContent',
  'as'   => 'blog-cat-page'
]);

Route::get( '/san-pham/tag/{tag_slug}', [
  'uses' => 'Frontend\FrontendManagerController@tagSinglePageContent',
  'as'   => 'tag-single-page'
]);

Route::get( '/san-pham/so-sanh-san-pham', [
  'uses' => 'Frontend\FrontendManagerController@productComparisonPageContent',
  'as'   => 'product-comparison-page'
]);

Route::post( '/san-pham/chi-tiet/{details_slug}', [
  'uses' => 'Frontend\UserCommentsController@saveUserComments',
  'as'   => 'save-user-comments'
]);

Route::post( '/blog/{blog_slug}', [
  'uses' => 'Frontend\UserCommentsController@saveUserComments',
  'as'   => 'save-user-blog-comments'
]);

// frontend user account route
Route::group(['prefix' => 'user', 'namespace' => 'Frontend'], function () {
  Route::get( 'account', [
    'uses' => 'UserAccountManageController@userAccountPageContent',
    'as'   => 'user-account-page'
  ])->middleware('userAdmin');
  
  Route::get( 'account/dashboard', [
    'uses' => 'UserAccountManageController@userAccountPageContent',
    'as'   => 'user-dashboard-page'
  ])->middleware('userAdmin');
  
  Route::get( 'account/my-address', [
    'uses' => 'UserAccountManageController@userAccountAddressPageContent',
    'as'   => 'my-address-page'
  ])->middleware('userAdmin');
  
  Route::get( 'account/my-address/add', [
    'uses' => 'UserAccountManageController@userAccountAddressPageContent',
    'as'   => 'my-address-add-page'
  ])->middleware('userAdmin');
  
  Route::get( 'account/my-address/edit', [
    'uses' => 'UserAccountManageController@userAccountAddressPageContent',
    'as'   => 'my-address-edit-page'
  ])->middleware('userAdmin');
  
  Route::get( 'account/my-orders', [
    'uses' => 'UserAccountManageController@userAccountOrdersPageContent',
    'as'   => 'my-orders-page'
  ])->middleware('userAdmin');
  
  Route::get( 'account/view-orders-details/{user_order_id}', [
    'uses' => 'UserAccountManageController@goToDifferentPages',
    'as'   => 'user-order-details-page'
  ]);
  
  Route::get( 'account/my-saved-items', [
    'uses' => 'UserAccountManageController@userAccountAddressPageContent',
    'as'   => 'my-saved-items-page'
  ])->middleware('userAdmin');
  
  Route::get( 'account/my-coupons', [
    'uses' => 'UserAccountManageController@userAccountCouponsPageContent',
    'as'   => 'my-coupons-page'
  ])->middleware('userAdmin');
  
  Route::get( 'account/download', [
    'uses' => 'UserAccountManageController@userAccountDownloadPageContent',
    'as'   => 'download-page'
  ])->middleware('userAdmin');
  
  Route::get( 'account/my-profile', [
    'uses' => 'UserAccountManageController@userAccountProfilePageContent',
    'as'   => 'my-profile-page'
  ])->middleware('userAdmin');
  
  Route::get( 'account/order-details/{order_id}/{order_process_id}', [
    'uses' => 'UserAccountManageController@userAccountOrderDetailsContent',
    'as'   => 'account-order-details-page'
  ]);
  
  Route::post( 'account/my-address/add', [
    'uses' => 'UserAccountManageController@saveUserAccountData',
    'as'   => 'my-address-add-post'
  ]);
  
  Route::post( 'account/my-address/edit', [
    'uses' => 'UserAccountManageController@saveUserAccountData',
    'as'   => 'my-address-edit-post'
  ]);
  
  Route::post( 'account/my-profile', [
    'uses' => 'UserAccountManageController@updateFrontendUserProfile',
    'as'   => 'update-profile-post'
  ]);
  
  Route::post( 'account/logout', [
    'uses' => 'UserAccountManageController@userLogout',
    'as'   => 'user-logout'
  ]);
});

Route::get( '/download/file/{product_id}/{order_id}/{file_id}/{target}', [
  'uses' => 'Frontend\FrontendManagerController@forceDownload',
  'as'   => 'downloadable-product-download'
]);

Route::get('/auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/auth/{provide}/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['prefix' => 'api', 'namespace' => 'Frontend'], function () {


});