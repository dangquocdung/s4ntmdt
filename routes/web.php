<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//installation route
Route::get('/installation', [
  'uses' => 'Admin\InstallationController@installationCheck',
  'as'   => 'installation-int'
]);

Route::group(['namespace' => 'Auth'], function () {
  Route::get('/installation-process', [
    'uses' => 'RegisterController@redirectToInstallationProcess',
    'as'   => 'installation-process'
  ]);

  Route::post('/installation-process', [
    'uses' => 'RegisterController@installationDataSave',
    'as'   => 'admin-data-save'
  ]);

  //admin login route
  Route::get( '/quan-tri/dang-nhap', [
    'uses' => 'LoginController@goToAdminLoginPage',
    'as'   => 'admin.login'
  ]);

  Route::post( '/quan-tri/dang-nhap' , [
    'uses' => 'LoginController@postAdminLogin',
    'as'   => 'admin.post_login'
  ]);

  //admin logout route
  Route::post( '/quan-tri/dang-xuat', [
    'uses' => 'LoginController@logoutFromLogin',
    'as'   => 'admin.logout'
  ]);

  //admin forgot password route 
  Route::get( '/quan-tri/quen-mat-khau', [
    'uses' => 'ForgotPasswordController@redirectForgotPassword',
    'as' => 'forgotPassword'
  ]);

  Route::post( '/quan-tri/quen-mat-khau', [
    'uses' => 'ForgotPasswordController@postForgotPassword',
    'as' => 'forgotPasswordUpdate'
  ]);

  //frontend user and vendor login route
  Route::get( '/thanh-vien/dang-nhap', [
    'uses' => 'LoginController@goToFrontendLoginPage',
    'as'   => 'user-login-page'
  ]);

  Route::post( '/thanh-vien/dang-nhap', [
    'uses' => 'LoginController@postFrontendLogin',
    'as'   => 'user-login-post'
  ]);

  //frontend user and vendor registration route
  Route::get( '/thanh-vien/dang-ky', [
    'uses' => 'RegisterController@redirectToUserRegistrationProcess',
    'as'   => 'user-registration-page'
  ]);

  Route::get( '/gian-hang/dang-ky', [
    'uses' => 'RegisterController@redirectToVendorRegistrationProcess',
    'as'   => 'vendor-registration-page'
  ]);

  Route::post( '/thanh-vien/dang-ky', [
    'uses' => 'RegisterController@userRegistration',
    'as'   => 'user-registration-post'
  ]);

  Route::post( '/gian-hang/dang-ky', [
    'uses' => 'RegisterController@vendorRegistration',
    'as'   => 'vendor-registration-post'
  ]);

  Route::get( '/thanh-vien/kich-hoat-tai-khoan/{confirmation_code}', [
    'uses' => 'RegisterController@userVerify',
    'as'   => 'user-verify'
  ]);

  Route::get( '/nha-cung-cap/kich-hoat-tai-khoan/{confirmation_code}', [
    'uses' => 'RegisterController@vendorVerify',
    'as'   => 'vendor-verify'
  ]);



  //frontend forgot password route
  Route::get( '/thanh-vien/quen-mat-khau', [
    'uses' => 'ForgotPasswordController@redirectForgotPassword',
    'as'   => 'user-forgot-password-page' 
  ]);

  Route::post( '/thanh-vien/quen-mat-khau', [
    'uses' => 'ForgotPasswordController@manageFrontendUserForgotPassword',
    'as'   => 'user-forgot-password-post'
  ]);
});

Route::group(['prefix' => 'admin'], function () {
  //cache clear route 
  Route::get('/clear-cache', [
    'uses' => 'FeaturesController@clearDesignCache',
    'as'   => 'admin.clearCache'
  ]);
});

//admin menu route
Route::group(['prefix' => 'admin'], function () {

  Route::get('users/roles/list', [
    'uses' => 'Admin\UserController@usersRoleListContent',
    'as'   => 'admin.users_roles_list'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('users/roles/add', [
    'uses' => 'Admin\UserController@usersRoleAddContent',
    'as'   => 'admin.add_roles'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
   
  Route::get('users/roles/update/{roles_id}', [
    'uses' => 'Admin\UserController@usersRoleUpdateContent',
    'as'   => 'admin.update_roles'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('users/list', [
    'uses' => 'Admin\UserController@usersListContent',
    'as'   => 'admin.users_list'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('user/add', [
    'uses' => 'Admin\UserController@usersAddContent',
    'as'   => 'admin.add_new_user'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('user/update/{user_id}', [
    'uses' => 'Admin\UserController@usersUpdateContent',
    'as'   => 'admin.update_new_user'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('user/profile', [
    'uses' => 'Admin\UserController@userProfileContent',
    'as'   => 'admin.user_profile'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
 
  //admin blog menu
  Route::get('pages/list', [
    'uses' => 'CMSController@pageListContent',
    'as'   => 'admin.all_pages'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('page/add', [
    'uses' => 'CMSController@pageAddContent',
    'as'   => 'admin.add_page'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('page/update/{page_slug}', [
    'uses' => 'CMSController@pageUpdateContent',
    'as'   => 'admin.update_page'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('blog/list', [
    'uses' => 'CMSController@blogListContent',
    'as'   => 'admin.all_blogs'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('blog/add', [
    'uses' => 'CMSController@blogAddContent',
    'as'   => 'admin.add_blog'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('blog/categories/list', [
    'uses' => 'CMSController@blogCategoriesListContent',
    'as'   => 'admin.blog_categories_list'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('blog/comments-list', [
    'uses' => 'CMSController@blogCommentsListContent',
    'as'   => 'admin.all_blog_comments'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('blog/update/{blog_slug}', [
    'uses' => 'CMSController@blogUpdateContent',
    'as'   => 'admin.update_blog'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  
  //admin dashboard menu
  Route::get('dashboard', [
    'uses' => 'AdminDashboardContentController@dashboardContent',
    'as'   => 'admin.dashboard'
  ])->middleware('verifyLoginPage', 'admin');

  Route::post('dashboard', [
    'uses' => 'AdminDashboardContentController@sendQuickMail',
    'as'   => 'admin.quick_mail_dashboard'
  ]);
  
  
  //admin products menu
  Route::get('product/list/{author_id}', [
    'uses' => 'ProductsController@productListContent',
    'as'   => 'admin.product_list'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('product/add', [
    'uses' => 'ProductsController@productAddContent',
    'as'   => 'admin.add_product'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('product/tags/list', [
    'uses' => 'ProductsController@productTagsListContent',
    'as'   => 'admin.product_tags_list'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('product/categories/list', [
    'uses' => 'ProductsController@productCategoriesListContent',
    'as'   => 'admin.product_categories_list'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('product/attributes/list', [
    'uses' => 'ProductsController@productAttributesListContent',
    'as'   => 'admin.product_attributes_list'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('product/colors/list', [
    'uses' => 'ProductsController@productColorsListContent',
    'as'   => 'admin.product_colors_list'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('product/sizes/list', [
    'uses' => 'ProductsController@productSizesListContent',
    'as'   => 'admin.product_sizes_list'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('product/comments-list', [
    'uses' => 'ProductsController@productCommentsListContent',
    'as'   => 'admin.all_products_comments'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('product/update/{slug}', [
    'uses' => 'ProductsController@productUpdateContent',
    'as'   => 'admin.update_product_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  
  //admin shipping menu
  Route::get('shipping-method/options', [
    'uses' => 'ShippingMethodController@shippingMethodOptionContent',
    'as'   => 'admin.shipping_method_options_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('shipping-method/flat-rate', [
    'uses' => 'ShippingMethodController@shippingMethodFlatRateContent',
    'as'   => 'admin.shipping_method_flat_rate_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('shipping-method/free-shipping', [
    'uses' => 'ShippingMethodController@shippingMethodFreeShippingContent',
    'as'   => 'admin.shipping_method_free_shipping_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('shipping-method/local-delivery', [
    'uses' => 'ShippingMethodController@shippingMethodLocalDeliveryContent',
    'as'   => 'admin.shipping_method_local_delivery_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  
  //admin payment menu
  Route::get('payment-method/options', [
    'uses' => 'PaymentMethodController@paymentMethodOptionsContent',
    'as'   => 'admin.payment_method_options_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('payment-method/direct-bank', [
    'uses' => 'PaymentMethodController@paymentMethodDirectBankContent',
    'as'   => 'admin.payment_method_direct_bank_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('payment-method/cash-on-delivery', [
    'uses' => 'PaymentMethodController@paymentMethodCashOnDeliveryContent',
    'as'   => 'admin.payment_method_cash_on_delivery_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('payment-method/paypal', [
    'uses' => 'PaymentMethodController@paymentMethodPaypalContent',
    'as'   => 'admin.payment_method_paypal_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('payment-method/stripe', [
    'uses' => 'PaymentMethodController@paymentMethodStripeContent',
    'as'   => 'admin.payment_method_stripe_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('payment-method/two-checkout', [
    'uses' => 'PaymentMethodController@paymentMethodTwoCheckoutContent',
    'as'   => 'admin.payment_method_two_checkout_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
 
  //admin manufacturer menu
  Route::get('manufacturers/list', [
    'uses' => 'CMSController@manufacturersListContent',
    'as'   => 'admin.manufacturers_list_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('manufacturers/add', [
    'uses' => 'CMSController@manufacturersAddContent',
    'as'   => 'admin.add_manufacturers_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('manufacturers/update/{manufacturers_id}', [
    'uses' => 'CMSController@manufacturersUpdateContent',
    'as'   => 'admin.update_manufacturers_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  
  //Extra features
	Route::get('extra-features/product-compare-fields', [
    'uses' => 'FeaturesController@productCompareFieldsContent',
    'as'   => 'admin.extra_features_compare_products_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
		
  //admin settings menu
  Route::get('settings/general', [
    'uses' => 'SettingsController@settingsGeneralContent',
    'as'   => 'admin.general_settings_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('settings/languages', [
    'uses' => 'SettingsController@settingsLanguagesContent',
    'as'   => 'admin.languages_settings_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('settings/languages/update/{update_id}', [
    'uses' => 'SettingsController@settingsLanguagesUpdateContent',
    'as'   => 'admin.update_languages_settings_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('settings/appearance', [
    'uses' => 'SettingsController@settingsAppearanceContent',
    'as'   => 'admin.frontend_layout_settings_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('settings/menu', [
    'uses' => 'SettingsController@settingsMenuContent',
    'as'   => 'admin.menu_layout_settings_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('settings/emails', [
    'uses' => 'SettingsController@settingsEmailContent',
    'as'   => 'admin.emails_settings_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('settings/emails/details/{emails_type}', [
    'uses' => 'SettingsController@settingsEmailDetailsContent',
    'as'   => 'admin.emails_type_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('settings/custom-currency/list', [
    'uses' => 'SettingsController@settingsCustomCurrencyListContent',
    'as'   => 'admin.custom_currency_settings_list_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('settings/custom-currency/add', [
    'uses' => 'SettingsController@settingsCustomCurrencyAddContent',
    'as'   => 'admin.custom_currency_settings_add_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('settings/custom-currency/update/{id}', [
    'uses' => 'SettingsController@settingsCustomCurrencyUpdateContent',
    'as'   => 'admin.custom_currency_settings_update_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  //admin custom designer menu
  Route::get('designer/clipart/categories/list', [
    'uses' => 'DesignerElementsController@designerArtCatListContent',
    'as'   => 'admin.art_categories_list_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('designer/clipart/list', [
    'uses' => 'DesignerElementsController@designerClipartListContent',
    'as'   => 'admin.clipart_list_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('designer/clipart/category/add', [
    'uses' => 'DesignerElementsController@designerArtCatAddContent',
    'as'   => 'admin.art_new_category_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('designer/clipart/add', [
    'uses' => 'DesignerElementsController@designerClipartAddContent',
    'as'   => 'admin.add_new_art_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('designer/settings', [
    'uses' => 'DesignerElementsController@designerSettingsContent',
    'as'   => 'admin.designer_settings_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('designer/shape/list', [
    'uses' => 'DesignerElementsController@designerShapeListContent',
    'as'   => 'admin.shape_list_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('designer/shape/add', [
    'uses' => 'DesignerElementsController@designerShapeAddContent',
    'as'   => 'admin.shape_add_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('designer/shape/update/{shape_slug}', [
    'uses' => 'DesignerElementsController@designerShapeUpdateContent',
    'as'   => 'admin.shape_update_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('designer/fonts/list', [
    'uses' => 'DesignerElementsController@designerFontListContent',
    'as'   => 'admin.fonts_list_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('designer/font/add', [
    'uses' => 'DesignerElementsController@designerFontAddContent',
    'as'   => 'admin.font_add_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('designer/font/update/{font_slug}', [
    'uses' => 'DesignerElementsController@designerFontUpdateContent',
    'as'   => 'admin.font_update_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  
  //admin manage orders menu  
  Route::get('orders', [
    'uses' => 'OrderController@orderListsContent',
    'as'   => 'admin.shop_orders_list'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('orders/current-date', [
    'uses' => 'OrderController@orderCurrentDateContent',
    'as'   => 'admin.shop_current_date_orders_list'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('orders/details/{order_id}', [
    'uses' => 'OrderController@orderDetailsPageContent',
    'as'   => 'admin.view_order_details'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('custom-design/export/{order_id}/{access_token}', [
    'uses' => 'DesignerElementsController@designerExportDetailsPageContent',
    'as'   => 'admin.designer_export_data'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::post('orders/details/{order_id}', [
    'uses' => 'OrderController@updateOrderStatus',
    'as'   => 'admin.uppdate_order_status'
  ]);
  
  Route::get('reports', [
    'uses' => 'ReportController@reportListContent',
    'as'   => 'admin.reports_list'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('reports/sales-by-product-title', [
    'uses' => 'ReportController@reportSalesByProductTitle',
    'as'   => 'admin.reports_sales_by_product_title'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('reports/sales-by-month', [
    'uses' => 'ReportController@reportSalesByMonth',
    'as'   => 'admin.reports_sales_by_month'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('reports/sales-by-last-7-days', [
    'uses' => 'ReportController@reportSalesByLast7Days',
    'as'   => 'admin.reports_sales_by_last_7_days'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('reports/sales-by-custom-days', [
    'uses' => 'ReportController@reportSalesByCustomDaysDays',
    'as'   => 'admin.reports_sales_by_custom_days'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('reports/sales-by-payment-method', [
    'uses' => 'ReportController@reportSalesByPaymentMethod',
    'as'   => 'admin.reports_sales_by_payment_method'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('designer/clipart/category/update/{art_cat_id}', [
    'uses' => 'DesignerElementsController@designerArtCatUpdateContent',
    'as'   => 'admin.update_art_category_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('designer/clipart/update/{clipart_slug}', [
    'uses' => 'DesignerElementsController@designerClipartUpdateContent',
    'as'   => 'admin.update_clipart_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  
  //admin coupon menu 
  Route::get('coupon-manager/coupon/list', [
    'uses' => 'FeaturesController@couponListContent',
    'as'   => 'admin.coupon_manager_list'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('coupon-manager/coupon/add', [
    'uses' => 'FeaturesController@couponAddContent',
    'as'   => 'admin.coupon_manager_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('coupon-manager/coupon/update/{coupon_id}', [
    'uses' => 'FeaturesController@couponUpdateContent',
    'as'   => 'admin.update_coupon_manager_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
 
  //admin seo settings menu
  Route::get('manage/seo', [
    'uses' => 'CMSController@seoContent',
    'as'   => 'admin.manage_seo_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  //admin request product menu
  Route::get('customer/request-product', [
    'uses' => 'FeaturesController@customerRequestProductListContent',
    'as'   => 'admin.request_product_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  //admin subscription manager menu
  Route::get('subscription/custom', [
    'uses' => 'FeaturesController@subscriptionCustomContent',
    'as'   => 'admin.custom_subscription_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('subscription/mailchimp', [
    'uses' => 'FeaturesController@subscriptionMailchimpContent',
    'as'   => 'admin.mailchimp_subscription_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('subscription/settings', [
    'uses' => 'FeaturesController@subscriptionSettingsContent',
    'as'   => 'admin.settings_subscription_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::post('subscription/mailchimp', [
    'uses' => 'FeaturesController@updateSubscriptionData',
    'as'   => 'admin.update_mailchimp_subscription_content'
  ]);
  
  Route::post('subscription/settings', [
    'uses' => 'FeaturesController@updateSubscriptionSettings',
    'as'   => 'admin.update_subscription_settings_content'
  ]);
  
  
  //admin testimonial menu
  Route::get('testimonial/list', [
    'uses' => 'CMSController@testimonialListContent',
    'as'   => 'admin.testimonial_post_list_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('testimonial/add', [
    'uses' => 'CMSController@testimonialAddContent',
    'as'   => 'admin.testimonial_post_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('testimonial/update/{testimonial_slug}', [
    'uses' => 'CMSController@testimonialUpdateContent',
    'as'   => 'admin.update_testimonial_post_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  
  //admin vendors menu
  Route::get('vendors/list', [
    'uses' => 'VendorsController@vendorListContent',
    'as'   => 'admin.vendors_list_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('vendors/list/{status}', [
    'uses' => 'VendorsController@vendorStatusContent',
    'as'   => 'admin.vendors_list_with_status'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('vendor/settings', [
    'uses' => 'VendorsController@vendorMenuSettingsContent',
    'as'   => 'admin.vendors_settings_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  //admin vendor packages menu
  Route::get('vendors/package/create', [
    'uses' => 'VendorsController@vendorPackageCreateContent',
    'as'   => 'admin.vendors_packages_create_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('vendors/package/update/{update_id}', [
    'uses' => 'VendorsController@vendorPackageUpdateContent',
    'as'   => 'admin.vendors_packages_update_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('vendors/package/list', [
    'uses' => 'VendorsController@vendorPackageListContent',
    'as'   => 'admin.vendors_packages_list_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('vendors/withdraw', [
    'uses' => 'VendorsController@vendorWithdrawContent',
    'as'   => 'admin.withdraws_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('vendors/withdraw/{update_id}', [
    'uses' => 'VendorsController@vendorWithdrawRequestUpdateContent',
    'as'   => 'admin.withdraws_content_update'
  ]);
  
  Route::get('vendors/withdraw/request_delete/{id}', [
    'uses' => 'VendorsController@deleteVendorWithdrawRequest',
    'as'   => 'admin.delete_withdraws_request'
  ]);
  
  Route::get('status/vendors/withdraw/{status_name}', [
    'uses' => 'VendorsController@vendorWithdrawStatusContent',
    'as'   => 'admin.withdraws_status_change'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('vendors/earning-reports', [
    'uses' => 'VendorsController@vendorsEarningReportsContent',
    'as'   => 'admin.earning_reports_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('vendors/earning-reports/{tab_name}', [
    'uses' => 'VendorsController@vendorsEarningReportsParmsContent',
    'as'   => 'admin.earning_reports_content_by_tab'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('vendors/announcement/list', [
    'uses' => 'VendorsController@vendorAnnouncementListContent',
    'as'   => 'admin.announcement_list_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('vendors/announcement', [
    'uses' => 'VendorsController@vendorAnnouncementAddContent',
    'as'   => 'admin.announcement_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('vendors/announcement/{update_id}', [
    'uses' => 'VendorsController@vendorAnnouncementUpdateContent',
    'as'   => 'admin.announcement_update_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('vendors/settings', [
    'uses' => 'VendorsController@vendorSettingsContent',
    'as'   => 'admin.vendor_settings_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');

  Route::get('vendors/reviews', [
    'uses' => 'VendorsController@vendorReviewsContent',
    'as'   => 'admin.reviews_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('vendors/manage/packages', [
    'uses' => 'VendorsController@vendorPackagesManage',
    'as'   => 'admin.manage_packages_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('vendor/notice-board', [
    'uses' => 'VendorsController@vendorNoticeBoardContent',
    'as'   => 'admin.vendor_notice_board_content'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
  
  Route::get('vendor/notice-board/single/details/{slug}', [
    'uses' => 'VendorsController@vendorNoticeBoardAdminSinglePageContent',
    'as'   => 'admin.vendor_notice_board_single_content_details'
  ]);
  
  Route::get('order/invoice/{order_id}', [
    'uses' => 'OrderController@redirectOrderInvoice',
    'as'   => 'admin.order_invoice'
  ])->middleware('verifyLoginPage', 'admin', 'sufficientPermission');
});


// menu post
Route::group(['prefix' => 'admin'], function () {
  Route::post('manufacturers/add', [
    'uses' => 'CMSController@saveManufacturersData',
    'as'   => 'admin.save_manufacturers_content'
  ]);
  
  Route::post('manufacturers/update/{manufacturers_id}', [
    'uses' => 'CMSController@saveManufacturersData',
    'as'   => 'admin.update_post_manufacturers_content'
  ]);
  
  Route::post('product/add', [
    'uses' => 'ProductsController@saveProduct',
    'as'   => 'admin.save_product'
  ]);
  
  Route::post('product/update/{slug}', [
    'uses' => 'ProductsController@saveProduct',
    'as'   => 'admin.update_product'
  ]);
  
  Route::post('page/add', [
    'uses' => 'CMSController@savePagesData',
    'as'   => 'admin.save_page_data'
  ]);
  
  Route::post('page/update/{page_slug}', [
    'uses' => 'CMSController@savePagesData',
    'as'   => 'admin.update_page_content'
  ]);
  
  Route::post('blog/add', [
    'uses' => 'CMSController@blogPostSave',
    'as'   => 'admin.add_blog_post'
  ]);
  
  Route::post('blog/update/{blog_slug}', [
    'uses' => 'CMSController@blogPostSave',
    'as'   => 'admin.update_blog_post'
  ]);
  
  Route::post('testimonial/add', [
    'uses' => 'CMSController@saveTestimonialPost',
    'as'   => 'admin.save_testimonial_post_content'
  ]);
  
  Route::post('testimonial/update/{testimonial_slug}', [
    'uses' => 'CMSController@saveTestimonialPost',
    'as'   => 'admin.save_update_testimonial_post_content'
  ]);
  
  Route::post('shipping-method/options', [
    'uses' => 'ShippingMethodController@saveShippingMethod',
    'as'   => 'admin.save_shipping_method_option'
  ]);
  
  Route::post('shipping-method/flat-rate', [
    'uses' => 'ShippingMethodController@saveShippingMethod',
    'as'   => 'admin.save_shipping_method_flat_rate'
  ]);
  
  Route::post('shipping-method/free-shipping', [
    'uses' => 'ShippingMethodController@saveShippingMethod',
    'as'   => 'admin.save_shipping_method_free_shipping'
  ]);
  
  Route::post('shipping-method/local-delivery', [
    'uses' => 'ShippingMethodController@saveShippingMethod',
    'as'   => 'admin.save_shipping_method_local_delivery'
  ]);
  
  Route::post('payment-method/options', [
    'uses' => 'PaymentMethodController@savePaymentData',
    'as'   => 'admin.save_payment_method_options'
  ]);
  
  Route::post('payment-method/direct-bank', [
    'uses' => 'PaymentMethodController@savePaymentData',
    'as'   => 'admin.save_direct_bank_content'
  ]);
  
  Route::post('payment-method/cash-on-delivery', [
    'uses' => 'PaymentMethodController@savePaymentData',
    'as'   => 'admin.save_cash_on_delivery_content'
  ]);
  
  Route::post('payment-method/paypal', [
    'uses' => 'PaymentMethodController@savePaymentData',
    'as'   => 'admin.save_paypal_content'
  ]);
  
  Route::post('payment-method/stripe', [
    'uses' => 'PaymentMethodController@savePaymentData',
    'as'   => 'admin.save_stripe_content'
  ]);
  
  Route::post('payment-method/two-checkout', [
    'uses' => 'PaymentMethodController@savePaymentData',
    'as'   => 'admin.save_2checkout_content'
  ]);
  
  Route::post('designer/clipart/category/add', [
    'uses' => 'DesignerElementsController@saveArtCategoryData',
    'as'   => 'admin.save_art_category_content'
  ]);
  
  Route::post('designer/clipart/category/update/{art_cat_slug}', [
    'uses' => 'DesignerElementsController@updateArtCatDetails',
    'as'   => 'admin.update_post_art_category_content'
  ]);
  
  Route::post('designer/clipart/add', [
    'uses' => 'DesignerElementsController@saveArtData',
    'as'   => 'admin.save_art_content'
  ]);
  
  Route::post('designer/shape/add', [
    'uses' => 'DesignerElementsController@saveDesignerShape',
    'as'   => 'admin.save_shape_content'
  ]);
  
  Route::post('designer/shape/update/{shape_id}', [
    'uses' => 'DesignerElementsController@saveDesignerShape',
    'as'   => 'admin.update_shape_content'
  ]);
  
  Route::post('designer/font/add', [
    'uses' => 'DesignerElementsController@saveDesignerFont',
    'as'   => 'admin.save_font_content'
  ]);
  
  Route::post('designer/font/update/{font_slug}', [
    'uses' => 'DesignerElementsController@saveDesignerFont',
    'as'   => 'admin.update_font_content'
  ]);

  
  Route::post('designer/clipart/update/{clipart_slug}', [
    'uses' => 'DesignerElementsController@updateArtData',
    'as'   => 'admin.update_post_clipart_content'
  ]);
  
  Route::post('designer/settings', [
    'uses' => 'DesignerElementsController@updateDesignerSettings',
    'as'   => 'admin.update_designer_settings_content'
  ]);
		
	Route::post('coupon-manager/coupon/add', [
    'uses' => 'FeaturesController@saveCoupon',
    'as'   => 'admin.save_coupon_manager_content'
  ]);
		
	Route::post('coupon-manager/coupon/update/{coupon_slug}', [
    'uses' => 'FeaturesController@saveCoupon',
    'as'   => 'admin.update_post_coupon_manager_content'
  ]);
		
	Route::post('manage/seo', [
    'uses' => 'CMSController@updateSeoData',
    'as'   => 'admin.update_manage_seo_content'
  ]);
  
  Route::post('extra-features/product-compare-fields', [
    'uses' => 'FeaturesController@saveProductCompareMoreFields',
    'as'   => 'admin.save_product_compare_more_fields'
  ]);
  
  Route::post('user/add', [
    'uses' => 'Admin\UserController@postUserCreate',
    'as'   => 'admin.create_new_user'
  ]);
  
  Route::post('user/update/{user_id}', [
    'uses' => 'Admin\UserController@postUserCreate',
    'as'   => 'admin.update_post_new_user'
  ]);
  
  Route::post('users/roles/add', [
    'uses' => 'Admin\UserController@postUserRole',
    'as'   => 'admin.save_roles'
  ]);
  
  Route::post('users/roles/update/{roles_id}', [
    'uses' => 'Admin\UserController@postUserRole',
    'as'   => 'admin.update_roles'
  ]);
	
  Route::post('user/profile', [
    'uses' => 'Admin\UserController@updateUserProfile',
    'as'   => 'admin.update_user_profile'
  ]);
  
  Route::post('settings/general', [
    'uses' => 'SettingsController@updateSettingsData',
    'as'   => 'admin.update_general_settings_content'
  ]);
  
  Route::post('settings/languages', [
    'uses' => 'SettingsController@manageLangFile',
    'as'   => 'admin.manage_languages_file'
  ]);
  
  Route::post('settings/languages/update/{update_id}', [
    'uses' => 'SettingsController@manageLangFile',
    'as'   => 'admin.update_post_languages_settings_content'
  ]);
  
  Route::post('settings/appearance', [
    'uses' => 'SettingsController@saveAppearanceSettingsData',
    'as'   => 'admin.update_frontend_settings_data'
  ]);
   
  Route::post('vendor/settings', [
    'uses' => 'VendorsController@saveVendorSettings',
    'as'   => 'admin.save_vendors_settings_content'
  ]);
  
  Route::post('vendors/package/create', [
    'uses' => 'VendorsController@saveVendorPackages',
    'as'   => 'admin.vendors_packages_content_save'
  ]);
  
  Route::post('vendors/package/update/{update_id}', [
    'uses' => 'VendorsController@updateVendorPackages',
    'as'   => 'admin.vendors_packages_update'
  ]);
  
  Route::post('vendors/manage/packages', [
    'uses' => 'VendorsController@saveVendorPackage',
    'as'   => 'admin.vendor_package_save'
  ]);
  
  Route::post('vendors/withdraw', [
    'uses' => 'VendorsController@vendorWithdrawRequestContentSave',
    'as'   => 'admin.withdraws_request_content_save'
  ]);
  
  Route::post('vendors/withdraw/{update_id}', [
    'uses' => 'VendorsController@vendorWithdrawRequestContentSave',
    'as'   => 'admin.withdraws_request_content_update'
  ]);
  
  Route::post('vendors/announcement', [
    'uses' => 'VendorsController@saveVendorAnnouncement',
    'as'   => 'admin.announcement_content_save'
  ]);
  
  Route::post('vendors/announcement/{update_id}', [
    'uses' => 'VendorsController@updateVendorAnnouncement',
    'as'   => 'admin.announcement_content_update'
  ]);
  
  Route::post('vendors/settings', [
    'uses' => 'VendorsController@saveVendorSettingsData',
    'as'   => 'admin.vendor_settings_content_save'
  ]);
		
  Route::post('settings/emails/details/{emails_type}', [
    'uses' => 'SettingsController@saveEmailsContentData',
    'as'   => 'admin.save_emails_content_data'
  ]);
  
  Route::post('settings/custom-currency/add', [
    'uses' => 'SettingsController@settingsCustomCurrencySaveContent',
    'as'   => 'admin.custom_currency_settings_save_content'
  ]);
  
  Route::post('settings/custom-currency/update/{id}', [
    'uses' => 'SettingsController@settingsCustomCurrencyUpdateContentData',
    'as'   => 'admin.custom_currency_settings_update_content_data'
  ]);
});



//admin upload product related image route
Route::post('/upload/product-related-image', [
  'uses' => 'Admin\AdminAjaxController@saveRelatedImage',
  'as'   => 'save-product-image'
]);

Route::post('/upload/product-gallery-images', [
  'uses' => 'Admin\AdminAjaxController@saveProductGalleryImages',
  'as'   => 'save-product-gallery-images'
]);

Route::post('/upload/art-all-images', [
  'uses' => 'Admin\AdminAjaxController@saveArtAllImages',
  'as'   => 'save-art-images'
]);

Route::post('/upload/product-video-file', [
  'uses' => 'Admin\AdminAjaxController@saveProductVideo',
  'as'   => 'save-product-video'
]);

Route::post('/upload/designer-images', [
  'uses' => 'Common\CommonAjaxController@uploadDesignerImage',
  'as'   => 'upload-designer-images'
]);

Route::post('/upload/upload-downloadable-file', [
  'uses' => 'Admin\AdminAjaxController@uploadDownloadableFiles',
  'as'   => 'upload-downloadable-files'
]);

Route::post('/upload/upload-variable-product-downloadable-file', [
  'uses' => 'Admin\AdminAjaxController@uploadVariableProductDownloadableFiles',
  'as'   => 'upload-variable-products-downloadable-files'
]);


//admin ajax post route
Route::post('/ajax/add-cat', [
  'uses' => 'Admin\AdminAjaxController@saveCategoriesDetails',
  'as'   => 'save-categories-details'
]);

Route::post('/ajax/add-tag', [
  'uses' => 'Admin\AdminAjaxController@saveTagsDetails',
  'as'   => 'save-tags-details'
]);

Route::post('/ajax/add-attribute', [
  'uses' => 'Admin\AdminAjaxController@saveAttributesDetails',
  'as'   => 'save-attr-details'
]);

Route::post('/ajax/add-color', [
  'uses' => 'Admin\AdminAjaxController@saveColorDetails',
  'as'   => 'save-color-details'
]);

Route::post('/ajax/add-size', [
  'uses' => 'Admin\AdminAjaxController@saveSizeDetails',
  'as'   => 'save-size-details'
]);

Route::post('/ajax/edit-data', [
  'uses' => 'Admin\AdminAjaxController@getSpecificDetailsById',
  'as'   => 'get-specific-details'
]);

Route::post('/ajax/delete-item', [
  'uses' => 'Admin\AdminAjaxController@selectedItemDeleteById',
  'as'   => 'selected-item-delete'
]);

Route::post('/ajax/comments-status-change', [
  'uses' => 'Admin\AdminAjaxController@selectedCommentsStatusChange',
  'as'   => 'selected-comments-status-change'
]);

Route::post('/ajax/add-variation', [
  'uses' => 'Admin\AdminAjaxController@saveProductsVariations',
  'as'   => 'save-products-variations'
]);

Route::post('/ajax/get-variation-view-data', [
  'uses' => 'Admin\AdminAjaxController@getProductsVariationsDataById',
  'as'   => 'get-products-variations-data'
]);

Route::post('/ajax/add-attributes-by-product', [
  'uses' => 'Admin\AdminAjaxController@addAttributeByProductId',
  'as'   => 'add-attribute'
]);

Route::post('/ajax/get-available-attributes-with-html', [
  'uses' => 'Admin\AdminAjaxController@getAvailableAttributesWithHtml',
  'as'   => 'get-available-attribute'
]);

Route::post('/ajax/get-clipart-categories-images-with-html', [
  'uses' => 'Common\CommonAjaxController@getAvailableClipartCategoriesImagesWithHtml',
  'as'   => 'get-available-cat-images'
]);

Route::post('/ajax/save_custom_data', [
  'uses' => 'Common\CommonAjaxController@saveCustomDesign',
  'as'   => 'save-custom-design'
]);

Route::post('/ajax/remove_custom_data', [
  'uses' => 'Common\CommonAjaxController@removeCustomDesign',
  'as'   => 'remove-custom-design'
]);

Route::post('/ajax/report_data_by_filter', [
  'uses' => 'Common\CommonAjaxController@getReportDataByFilter',
  'as'   => 'report-data-by-filter'
]);

Route::post('/ajax/appearance_data_manage', [
  'uses' => 'Admin\AdminAjaxController@appearanceDataSave',
  'as'   => 'appearance-data-save'
]);

Route::post('/upload/frontend-images', [
  'uses' => 'Admin\AdminAjaxController@uploadFrontendImages',
  'as'   => 'upload-frontend-images'
]);

Route::post('/upload/banner-frontend-images', [
  'uses' => 'Admin\AdminAjaxController@uploadBannerFrontendImages',
  'as'   => 'upload-banner-frontend-images'
]);

Route::post('/ajax/import_product_file', [
  'uses' => 'Admin\AdminAjaxController@manageImportProductFile',
  'as'   => 'import-product-file'
]);

Route::get('/export_products', [
  'uses' => 'ProductsController@manageExportProducts',
  'as'   => 'export-products'
]);

Route::get('/ajax/get_products_for_linked_type', [
  'uses' => 'Admin\AdminAjaxController@getProductsForLinkedType',
  'as'   => 'linked-type-products'
]);

Route::get('/ajax/get_all_vendor', [
  'uses' => 'Admin\AdminAjaxController@getAllVendor',
  'as'   => 'all-vendor'
]);

Route::post('/ajax/get_vendor_profile_by_id', [
  'uses' => 'Admin\AdminAjaxController@getVendorProfileById',
  'as'   => 'vendor-profile-data'
]);

Route::post('/ajax/get_vendor_withdraw_requested_data_by_id', [
  'uses' => 'Admin\AdminAjaxController@getVendorWithdrawRequestedDataById',
  'as'   => 'vendor-withdraw-requested-data'
]);

Route::post('/ajax/requested_withdraw_status_change', [
  'uses' => 'Admin\AdminAjaxController@requestedWithdrawStatusChange',
  'as'   => 'requested-withdraw-status-change'
]);

Route::post('/ajax/vendor-status-change', [
  'uses' => 'Admin\AdminAjaxController@vendorStatusChange',
  'as'   => 'vendor-status-change'
]);

Route::post('/ajax/product-status-change', [
  'uses' => 'Admin\AdminAjaxController@productStatusChange',
  'as'   => 'product-status-change'
]);


Route::get('/ajax/get_categories_for_vendor', [
  'uses' => 'Admin\AdminAjaxController@getParentCatForVendor',
  'as'   => 'get-cat-for-vendors'
]);

Route::get('/ajax/force_designer_file_download', [
  'uses' => 'Admin\AdminAjaxController@forceDesignerFile',
  'as'   => 'force-designer'
]);

Route::post('/ajax/update_menu_content', [
  'uses' => 'Admin\AdminAjaxController@updateMenuSettingsContent',
  'as'   => 'update-menu-content'
]);