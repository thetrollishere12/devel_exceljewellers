<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
    
})->name('main');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

// Google
Route::get('/google-login', 'GoogleController@redirectToProvider');

Route::get('/callback', 'GoogleController@handleProviderCallback');

// nav
Route::get('contact','ServiceController@contact_us');
Route::post('send-mail','ServiceController@send_mail');
Route::get('location','ServiceController@location');
Route::get('shipping-returns','ServiceController@shipping_returns');
Route::get('terms-condition','ServiceController@terms_condition');
Route::get('privacy-policy','ServiceController@privacy_policy');

Route::get('error',function(){
    return view('error');
});

Route::post('currency','AjaxController@currency');


// Jewellery shop
Route::get('/engagement-ring','JewelleryController@engagement_ring');

Route::get('/wedding-band','JewelleryController@wedding_band');

Route::get('/fine-jewellery','JewelleryController@fine_jewellery');

Route::get('/moissanite','JewelleryController@moissanite');

Route::get('/lab-grown-diamond','JewelleryController@lab_grown');

Route::get('/diamonds','JewelleryController@diamonds');

Route::get('/search','JewelleryController@search');

// ajax

Route::post('/engagement-ring','AjaxController@engagement_setting');

Route::post('/wedding-band','AjaxController@wedding_bands');

Route::post('/fine-jewellery','AjaxController@fine_jewellerys');

Route::post('/moissanite','AjaxController@moissanite');

Route::post('/lab-grown-diamond','AjaxController@lab_diamond');

Route::post('/diamonds','AjaxController@natural_diamond');

Route::post('/filter-lab-grown-diamond','AjaxController@filter_lab_diamond');

Route::post('/filter-diamonds','AjaxController@filter_natural_diamond');

Route::post('/search','AjaxController@search');

// Jewellery Product Shop

Route::get('/engagement-ring/{id}','ProductController@engagement_ring');

Route::get('/wedding-band/{id}','ProductController@wedding_band');

Route::get('/fine-jewellery/{id}','ProductController@fine_jewellery');

Route::get('/moissanite/{id}','ProductController@moissanite');

Route::get('/lab-grown-diamond/{id}','ProductController@lab_grown');

Route::get('/diamonds/{id}','ProductController@diamonds');


// Custom Ring

Route::get('/complete-ring','CreateRingController@complete_ring');

Route::post('/add-setting', 'CreateRingController@addsetting');

Route::post('/add-complete-ring-to-cart', 'CreateRingController@add_complete_ring');

Route::post('/refresh-custom-bar','CreateRingController@refresh_custom_bar');

Route::post('/refresh-stone-popup','CreateRingController@refresh_stone_popup');

// shopping cart

Route::get('/shopcart','ShoppingCartController@cart');

Route::post('/add-cart', 'ShoppingCartController@addcart');

Route::post('/cart-num','ShoppingCartController@num');

Route::post('/shop-cart-num','ShoppingCartController@cart_num');

Route::post('/refresh','ShoppingCartController@cartrefresh');

Route::post('/remove-item', 'ShoppingCartController@removeitem');

// Coupon

Route::post('/apply-coupon','CouponController@apply_coupon');

Route::post('/remove-coupon','CouponController@remove_coupon');


// Checkout Process

Route::get('/checkout','CheckoutController@checkout')->name('checkout');

Route::post('/payment-type','CheckoutController@payment_type');

Route::get('/thankyou','CheckoutController@thankyou');

// Stripe Payment

Route::post('/stripe-payment','StripeController@stripe_payment');

// 

// Paypal Payment

Route::post('process','PaypalController@process');

// 


Route::group(['middleware' => 'auth'], function () {

    // favourite

    Route::post('/favourite','CustomerFavouriteController@favourite');

    Route::get('/wishlist','CustomerFavouriteController@favourite_product');

    Route::post('/remove-fav','CustomerFavouriteController@remove_favourite');

    // account

    Route::post('/address','AccountController@address');

    Route::post('/add_address','AccountController@add_address');

    Route::post('/delete_address','AccountController@delete_address');

    Route::post('/edit_address','AccountController@edit_address');

    // Order

    Route::get('/orders','CustomerOrderController@orders');

    Route::post('/returns','CustomerOrderController@returns');

    Route::post('/initiate-return','CustomerOrderController@initiate_returns');

    Route::post('/submit_review','CustomerOrderController@post_review');

});

// Education
Route::get('/education-diamond','EducationController@diamond');
Route::get('/education-diamond-shape','EducationController@diamond_shape');
Route::get('/education-diamond-color','EducationController@diamond_color');
Route::get('/education-diamond-clarity','EducationController@diamond_clarity');
Route::get('/education-diamond-carat','EducationController@diamond_carat');
Route::get('/education-diamond-cut','EducationController@diamond_cut');

Route::get('/education-engagement','EducationController@engagement');
Route::get('/education-eng-style','EducationController@eng_style');
Route::get('/education-eng-setting','EducationController@eng_setting');
Route::get('/education-eng-size','EducationController@eng_size');

Route::get('/education-weddingband','EducationController@weddingband');
Route::get('/education-weddingband-style','EducationController@weddingband_style');
Route::get('/education-weddingband-metal','EducationController@weddingband_metal');
Route::get('/education-weddingband-size','EducationController@weddingband_size');

// Route::get('/education-diamond','EducationController@diamond_cut');
// Route::get('/education-diamond','EducationController@diamond_clarity');
// Route::get('/education-diamond','EducationController@diamond_color');
// Route::get('/education-diamond','EducationController@diamond_carat');

// Service
Route::get('trade-up','ServiceController@trade_up');
Route::get('appraisal','ServiceController@appraisal');
Route::get('warranty','ServiceController@warrenty');
Route::get('repair','ServiceController@repair');
Route::get('consignment','ServiceController@consignment');
Route::get('trade-sell','ServiceController@trade_sell');
Route::get('insurrance','ServiceController@insurrance');
Route::get('layaway-and-financing','ServiceController@layaway');
Route::get('about','ServiceController@company_info');
Route::post('verragio_show','ServiceController@booking');

require __DIR__.'/auth.php';
