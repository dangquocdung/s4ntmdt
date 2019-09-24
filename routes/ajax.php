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


//frontend ajax route
Route::post('/ajax/filter_products', [
  'uses' => 'Frontend\FrontendAjaxController@getProductsByFilterWithName',
  'as'   => 'get-products-by-filter'
]);

Route::post('/ajax/add-to-cart', [
  'uses' => 'Frontend\FrontendAjaxController@productAddToCart',
  'as'   => 'product-add-to-cart'
]);

Route::post('/ajax/customize-product-add-to-cart', [
  'uses' => 'Frontend\FrontendAjaxController@customizeProductAddToCart',
  'as'   => 'customize-product-add-to-cart'
]);

Route::post('/ajax/cart-total-update-by-shipping-method', [
  'uses' => 'Frontend\FrontendAjaxController@cartTotalUpdateUsingShippingMethod',
  'as'   => 'cart-total-update-by-shipping'
]);

Route::post('/ajax/save_custom_design_img', [
  'uses' => 'Frontend\FrontendAjaxController@saveCustomDesignImage',
  'as'   => 'save-custom-design-image'
]);

Route::post('/ajax/requested_product_data', [
  'uses' => 'Frontend\FrontendAjaxController@storeRequestedProductData',
  'as'   => 'save-request-product-data'
]);

Route::post('/ajax/manage_designer_export_data', [
  'uses' => 'Admin\AdminAjaxController@manageDesignerExportData',
  'as'   => 'manage-designer-export-data'
]);

Route::post('/ajax/uploaded_images_download', [
  'uses' => 'Admin\AdminAjaxController@uploadedImagesDownload',
  'as'   => 'uploaded-image-download'
]);

Route::post('/ajax/subscription_data', [
  'uses' => 'Frontend\FrontendAjaxController@storeSubscriptionData',
  'as'   => 'save-subscription-data'
]);

Route::post('/ajax/set_subscription_popup_cookie', [
  'uses' => 'Frontend\FrontendAjaxController@setCookieForSubscriptionPopup',
  'as'   => 'set-cookie-subscription'
]);

Route::post('/ajax/frontend-user-logout', [
  'uses' => 'Frontend\FrontendAjaxController@logoutFromFrontendUserLogin',
  'as'   => 'frontend-user-logout'
]);

Route::post('/ajax/user-wishlist-data-process', [
  'uses' => 'Frontend\FrontendAjaxController@userWishlistDataSaved',
  'as'   => 'wishlist-data-save'
]);

Route::post('/ajax/product-compare-data-process', [
  'uses' => 'Frontend\FrontendAjaxController@productCompareDataSaved',
  'as'   => 'product-compare-data-save'
]);

Route::post('/ajax/applyCoupon', [
  'uses' => 'Frontend\FrontendAjaxController@applyUserCoupon',
  'as'   => 'user-coupon-apply'
]);

Route::post('/ajax/removeCoupon', [
  'uses' => 'Frontend\FrontendAjaxController@removeUserCoupon',
  'as'   => 'user-coupon-remove'
]);

Route::post('/ajax/multi-lang-processing', [
  'uses' => 'Frontend\FrontendAjaxController@multiLangProcessing',
  'as'   => 'multi-lang-processing'
]);

Route::post('/ajax/multi-currency-processing', [
  'uses' => 'Frontend\FrontendAjaxController@multiCurrencyProcessing',
  'as'   => 'multi-currency-processing'
]);

Route::post('/ajax/get-quick-view-data-by-product-id', [
  'uses' => 'Frontend\FrontendAjaxController@getQuickViewProductData',
  'as'   => 'product-quick-view-data'
]);

Route::post('/ajax/delete-item-from-wishlist', [
  'uses' => 'Frontend\FrontendAjaxController@deleteItemFromWishlist',
  'as'   => 'wishlist-item-delete'
]);

Route::post('/ajax/get-mini-cart-data', [
  'uses' => 'Frontend\FrontendAjaxController@getMiniCartData',
  'as'   => 'mini-cart-data'
]);

Route::post('/ajax/contact-with-vendor', [
  'uses' => 'Frontend\FrontendAjaxController@contactWithVendorEmail',
  'as'   => 'contact-with-vendor-message'
]);

Route::post('/ajax/quan-huyen', [
  'uses' => 'Frontend\FrontendAjaxController@getQuanHuyen',
  'as'   => 'quan-huyen'
]);

Route::post('/ajax/xa-phuong', [
  'uses' => 'Frontend\FrontendAjaxController@getXaPhuong',
  'as'   => 'xa-phuong'
]);