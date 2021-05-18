<?php
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Botmancontroller;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProductController;
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



Route::get('/', [HomeController::class,'index'])->name('home');



//voyager admin routes 

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/product/attribute',[AttributeController::class,'view'])->name('admin.product.attribute.view');
    Route::get('/product/attribute/{product}',[AttributeController::class,'add'])->name('admin.product.attribute.add');
    Route::post('/product/attribute/store',[AttributeController::class,'store1'])->name('product.attribute.store');
});

Route::middleware(['auth'])->get('/home',function(){
    return view('home');
});
Route::middleware(['auth'])->get('/changepassword',function(){
    return view('auth.update-password');
});

//login through other platform id
Route::middleware(['guest'])->get('/sign-in/github',[SocialiteController::class,'github']);
Route::middleware(['guest'])->get('/sign-in/github/redirect',[SocialiteController::class,'githubRedirect']);

Route::middleware(['guest'])->get('/sign-in/facebook',[SocialiteController::class,'facebook']);
Route::middleware(['guest'])->get('/sign-in/facebook/redirect',[SocialiteController::class,'facebookRedirect']);

//cart controller routes

Route::middleware(['auth'])->get('/addtocart/{product}',[CartController::class,'add'])->name('cart.add');

Route::middleware(['auth'])->get('/cart',[CartController::class,'index'])->name('cart.index');


Route::middleware(['auth'])->get('/cartdestroy/{itemid}',[CartController::class,'destroy'])->name('cart.destroy');


Route::middleware(['auth'])->get('/cartupdate/{itemid}',[CartController::class,'update'])->name('cart.update');


Route::middleware(['auth'])->get('/cartcheckout',[CartController::class,'checkout'])->name('cart.checkout');

Route::middleware(['auth'])->get('/cart/apply-coupon',[CartController::class,'applyCoupon'])->name('cart.coupon');


// routes for order controller using resource

Route::resource('orders', OrderController::class)->middleware(['auth']);

//routes for paypal controller


Route::middleware(['auth'])->get('/paypal/checkout/{order}',[PayPalController::class,'getExpressCheckout'])->name('paypal.checkout');

Route::middleware(['auth'])->get('/paypal/checkout-success/{order}',[PayPalController::class,'getExpressCheckoutsuccess'])->name('paypal.success');

Route::middleware(['auth'])->get('/paypal/checkout-cancel',[PayPalController::class,'cancelpage'])->name('paypal.cancel');

//product controller routes



Route::get('/products/search', [ProductController::class,'search'])->name('products.search');


Route::get('/products/searchbyprice', [ProductController::class,'searchbyprice'])->name('products.search.price');

Route::resource('products', ProductController::class);

//route controller for pdf and csv 


Route::get('/invoicepdf',function(){
    $html = '<h1>hello pdf</h1>';
    $pdf = PDF::loadHtml($html);
    return $pdf->stream('invoice.pdf');
    // return $pdf->stream('invoice.pdf');
//     $cartitems=\Cart::session(auth()->id())->getContent();
//      $pdf = PDF::loadView('cart.index',$cartitems);
//  return $pdf->stream('invoice.pdf');
//  $cartitems=\Cart::session(auth()->id())->getContent();
//  $pdf = PDF::loadView('pdf.invoice', $cartitems);
//  return $pdf->download('invoice.pdf');
});
Route::get('/exportuser',[ExportController::class,'exportuser']);

//event driven route controller


// Route::get('/test', function () {
//     event(new App\Events\OrderPlaced('Someone'));
    
//     return "Event has been sent!";
// });
// Route::get('/event',function(){
//  event(new App\Events\OrderCompleted('how are you'));
// });

//complain controller routes


Route::get('/complain',[ComplainController::class,'open']);
Route::post('/complain',[ComplainController::class,'add'])->name('complain.store');

