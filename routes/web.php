<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PictureProductController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\MagicController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Client\AddressController;
use App\Http\Controllers\Client\CategoryProductController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\ProductController;

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


Route::get("/adminpanel/products/list", function () {
    return view('admin.products.list');
});

Route::get('about',[IndexController::class,'about'])->name('about');
Route::get('contactus',[IndexController::class,'contactus'])->name('contactus');

Route::post('contact/store',[ContactController::class,'store'])->name('contact.store');
Route::get('contact/index',[ContactController::class,'index'])->name('contact.index');
Route::delete('contact/{contact}/delete',[ContactController::class,'destroy'])->name('contact.destroy');


Route::post('basket/add/{product}', [BasketController::class, 'add'])->name('basket.add');
Route::get('basket/clear', [BasketController::class, 'clear'])->name('basket.clear');
Route::get('basket', [BasketController::class, 'index'])->name('basket.index');
Route::post('basket/update/{product}', [BasketController::class, 'update'])->name('basket.update');
Route::get('basket/destroy/{product}', [BasketController::class, 'destroy'])->name('basket.destroy');

Route::get('basket/checkout', [BasketController::class, 'checkoutForm'])->name('basket.checkout.form');
Route::post('basket/checkout', [BasketController::class, 'checkout'])->name('basket.checkout');


Route::post('payment/{gateway}/callback', [PaymentController::class, 'verify'])->name('payment.verify');


Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {

    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('auth.register.form');
    Route::post('register', [RegisterController::class, 'register'])->name('auth.register');

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('auth.login.form');
    Route::post('login', [LoginController::class, 'login'])->name('auth.login');

    Route::get('logout', [LoginController::class, 'logout'])->name('auth.logout');

    Route::get('email/send-verification', [VerificationController::class, 'send'])->name('auth.email.send.verification');
    Route::get('email/verify', [VerificationController::class, 'verify'])->name('auth.email.verify');

    Route::get('password/forget', [ForgotPasswordController::class, 'showForgetForm'])->name('auth.password.forget.form');
    Route::post('password/forget', [ForgotPasswordController::class, 'sendResetLink'])->name('auth.password.forget');

    Route::get('password/reset', [ResetPasswordController::class, 'showResetForm'])->name('auth.password.reset.form');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('auth.password.reset');

    Route::get('redirect/{provider}', [SocialController::class, 'redirectToProvider'])->name('auth.login.provider.redirect');

    Route::get('{provider}/callback', [SocialController::class, 'callbackProvider'])->name('auth.login.provider.callback');

    Route::get('magic/login', [MagicController::class, 'ShowMagicForm'])->name('auth.magic.login.form');
    Route::post('magic/login', [MagicController::class, 'sendToken'])->name('auth.magic.send.token');
    Route::get('magic/login/{token}', [MagicController::class, 'login'])->name('auth.magic.login');

});


Route::post('coupon', [CouponsController::class, 'apply'])->name('coupon.apply');
Route::get('coupon', [CouponsController::class, 'remove'])->name('coupon.remove');


//--------------------client panel-----------------

Route::name('client.')->group(function () {
    Route::resources([
        'products' => ClientProductController::class,
        'categories.products' => CategoryProductController::class,
    ]);

    Route::get('product/search',[ClientProductController::class,'search'])->name('products.search');



    Route::get('/profile/addresses', [AddressController::class, 'index'])->name('profile.address.index');
    Route::post('/profile/address', [AddressController::class, 'store'])->name('profile.address.store');

    Route::get('/profile/address/{address:id}/edit', [AddressController::class, 'edit'])->name('profile.address.edit');

    Route::post('/profile/address/change_default/{address:slug}', [AddressController::class, 'change_default'])->name('profile.address.changeDefault');
    Route::patch('/profile/address/{address:slug}', [AddressController::class, 'update'])->name('profile.address.update');
    Route::delete('/profile/address/{address:slug}', [AddressController::class, 'destroy'])->name('profile.address.destroy');

    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/orders/show', [ProfileController::class, 'showOrdersForm'])->name('profile.orders.show');
    Route::get('product/show/{product:slug}', [ClientProductController::class, 'showDetails'])->name('product.show_detail');

});

Route::prefix('/panel')->name('admin.')->middleware('role:admin')->group(function () {
    Route::resources([
        'products' => ProductController::class,
        'categories' => CategoryController::class,
//        'pictures.products' => \App\Http\Controllers\Admin\PictureProductController::class
        'order' => OrderController::class,
    ]);

    Route::get('profile/show',[UserController::class,'show'])->name('profile.show');
    Route::post('profile/{user}/update',[UserController::class,'update_profile'])->name('user.update.profile');

    Route::get('/order/{order}/cancel',[OrderController::class,'cancel'])->name('order.cancel');

    Route::get('/product/{product:slug}/pictures', [PictureProductController::class, 'show'])->name('product.pictures.show');
    Route::post('/product/{product:slug}/pictures', [PictureProductController::class, 'store'])->name('product.pictures.store');
    Route::delete('/picture/{picture}', [PictureProductController::class, 'destroy'])->name('product.pictures.destroy');


    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('users/{user}/edit', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');


    Route::get('roles/{role}/edit',[RoleController::class,'edit'])->name('roles.edit');
    Route::post('roles/{role}/edit',[RoleController::class,'update'])->name('roles.update');


    Route::delete('roles/{role}',[RoleController::class,'destroy'])->name('roles.destroy');



    Route::get('dashboard' , [DashboardController::class,'index'])->name('dashboard');

    Route::get("/", function () {
        return view('admin.layouts.app');
    })->name('panel.home');


    Route::get('category/subCategory/{category:slug}/create', [CategoryController::class, 'create_sub_category'])->name('category.subCategory.create');

});
Route::get('/', [ClientProductController::class, 'index'])->name('home');



