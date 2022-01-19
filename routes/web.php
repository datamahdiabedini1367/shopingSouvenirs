<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Auth\MagicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

//Route::get('/', function () {
//    $url = URL::temporarySignedRoute('test',now()->addMinute(60),['id'=>12]);

//    $url;
//    return view('welcome');
//})->name('home');

Route::get('/', [ProductController::class,'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('basket/add/{product}', [BasketController::class, 'add'])->name('basket.add');
Route::get('basket/clear', [BasketController::class, 'clear'])->name('basket.clear');
Route::get('basket', [BasketController::class, 'index'])->name('basket.index');
Route::post('basket/update/{product}', [BasketController::class, 'update'])->name('basket.update');

Route::get('basket/checkout', [BasketController::class, 'checkoutForm'])->name('basket.checkout.form');
Route::post('basket/checkout', [BasketController::class, 'checkout'])->name('basket.checkout');


Route::post('payment/{gateway}/callback',[PaymentController::class,'verify'])->name('payment.verify');


Route::group(['prefix'=>'auth','namespace'=>'Auth'],function(){

    Route::get('register',[RegisterController::class,'showRegistrationForm'])->name('auth.register.form');
    Route::post('register',[RegisterController::class,'register'])->name('auth.register');
    Route::get('login',[LoginController::class,'showLoginForm'])->name('auth.login.form');
    Route::post('login',[LoginController::class,'login'])->name('auth.login');

    Route::get('logout',[LoginController::class,'logout'])->name('auth.logout');

    Route::get('email/send-verification',[VerificationController::class,'send'])->name('auth.email.send.verification');
    Route::get('email/verify',[VerificationController::class,'verify'])->name('auth.email.verify');

    Route::get('password/forget',[ForgotPasswordController::class,'showForgetForm'])->name('auth.password.forget.form');
    Route::post('password/forget',[ForgotPasswordController::class,'sendResetLink'])->name('auth.password.forget');



    Route::get('password/reset',[ResetPasswordController::class,'showResetForm'])->name('auth.password.reset.form');
    Route::post('password/reset',[ResetPasswordController::class,'reset'])->name('auth.password.reset');


    Route::get('redirect/{provider}',[SocialController::class,'redirectToProvider'])->name('auth.login.provider.redirect');


    Route::get('{provider}/callback',[SocialController::class,'callbackProvider'])->name('auth.login.provider.callback');


    Route::get('magic/login',[MagicController::class,'ShowMagicForm'])->name('auth.magic.login.form');
    Route::post('magic/login',[MagicController::class,'sendToken'])->name('auth.magic.send.token');
    Route::get('magic/login/{token}',[MagicController::class,'login'])->name('auth.magic.login');

});



Route::post('coupon' , [CouponsController::class , 'apply'])->name('coupon.apply');
Route::get('coupon' , [CouponsController::class , 'remove'])->name('coupon.remove');

Route::get('test',function (){

    $product = \App\Models\Product::query()->find(1);
//    dd($product->category->coupons);
    dd($product->category->validCoupons);
    return "hi";
})->name('test');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resources([
    'products' => ProductController::class,
]);
