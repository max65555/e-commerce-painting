<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebadminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReviewsController;
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
//////////////////////////////////
///////////WEB_PAGE/////////////
//////////////////////////////////
//login and register
Route::get('/',function(){
    return view('Account/login');
})->name('login');
Route::get('/registor',function(){
    return view('Account/registor');
});
Route::post('/registor/add',[AccountController::class,'create']);
Route::post('/login/check',[AccountController::class,'checkLogin']);
Route::get('/home/{id}/changeinformation',[AccountController::class,'changeinformation'])->name('account.changeinformation');
Route::post('/home/{id}/updateInformation',[AccountController::class,'updateInformation'])->name('account.updateInformation');
//HomePage
Route::get('/home/{id}',[HomeController::class,'homePage'])->name('home');
Route::get('/home/product/{id}',[HomeController::class,'products'])->name('home.products');
//Product in HomePage
Route::get('/product/{id}',[ProductsController::class,'index'])->name('products.index');
Route::get('/home/product/{id}/newest',[HomeController::class,'NewestProducts'])->name('products.newest');
Route::get('/home/product/{id}/oldest',[HomeController::class,'OldestProducts'])->name('products.oldest');
Route::post('/home/product/{id}/search',[HomeController::class,'SearchProducts'])->name('products.search');
Route::get('/home/product/{id}/detail/{product_id}',[HomeController::class,'ProductDetail'])
->name('product.detail');
Route::get('/home/product/{id}/categories/{categories_id}',[HomeController::class,'CategoriesProduct'])->name('product.categories');
//Carts in HomePage
Route::get('/home/product/{id}/addtocart/{product_id}',[HomeController::class,'AddToCart'])->name('addToCart');
Route::get('/home/{id}/product/buynow/{product_id}',[HomeController::class,'BuyNow'])->name('buynow');
Route::get('/home/{id}/product/cart',[HomeController::class,'cart'])->name('cart');
Route::post('/home/{id}/product/cart/delete/{product_id}',[CartController::class,'destroy'])->name('cart.destroy');
Route::post('/home/{id}/product/cart/order',[CartController::class,'order'])->name('cart.order');
//////////////////////////////////
///////////WEB_ADMIN/////////////
//////////////////////////////////
//account in webadmin
Route::redirect('/webadmin', 'webadmin/account');
Route::get('/webadmin/account',[AccountController::class,'index'])->name('account.index');
Route::get('/webadmin/account/create',[AccountController::class,'createForm'])->name('account.create');
Route::post('/webadmin/account/add',[AccountController::class,'add'])->name('account.add');
Route::delete('/webadmin/account/destroy/{id}',[AccountController::class,'destroy'])->name('account.destroy');
Route::get('/webadmin/account/edit/{id}',[AccountController::class,'edit'])->name('account.edit');
Route::post('/webadmin/account/update/{id}',[AccountController::class,'update'])->name('account.update');
//products 

//product in webadmin
Route::get('/webadmin/product',[ProductsController::class,'index'])->name('product.index');
Route::get('/webadmin/product/create',[ProductsController::class,'create'])->name('product.create');
Route::post('/webadmin/product/store',[ProductsController::class,'store'])->name('product.store');
Route::delete('/webadmin/product/destroy/{id}',[ProductsController::class,'destroy'])->name('product.destroy');
Route::get('/webadmin/product/edit/{id}',[ProductsController::class,'edit'])->name('product.edit');
Route::post('/webadmin/product/update/{id}',[ProductsController::class,'update'])->name('product.update');
//categories in webadmin
Route::get('webadmin/categories',[CategoriesController::class,'index'])->name('categories.index');
Route::get('/webadmin/categories/create',[CategoriesController::class,'create'])->name('categories.create');
Route::post('/webadmin/categories/store',[CategoriesController::class,'store'])->name('categories.store');
Route::delete('/webadmin/categories/destroy/{id}',[CategoriesController::class,'destroy'])->name('categories.destroy');
Route::get('/webadmin/categories/edit/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
Route::post('/webadmin/categories/update/{id}',[CategoriesController::class,'update'])->name('categories.update');
//review in webadmin
Route::get('webadmin/review',[ReviewsController::class,'index'])->name('review.index');
Route::get('/webadmin/review/create',[ReviewsController::class,'create'])->name('review.create');
Route::post('/webadmin/review/store',[ReviewsController::class,'store'])->name('review.store');
Route::delete('/webadmin/review/destroy/{id}',[ReviewsController::class,'destroy'])->name('review.destroy');
Route::get('/webadmin/review/edit/{id}',[ReviewsController::class,'edit'])->name('review.edit');
Route::post('/webadmin/review/update/{id}',[ReviewsController::class,'update'])->name('review.update');
//Cart in WebAdmin
Route::get('/webadmin/cart',[CartController::class,'index'])->name('cart.index');
Route::get('/webadmin/cart/accept/{id}',[CartController::class,'accept'])->name('cart.accept');
Route::get('/webadmin/cart/deny/{id}',[CartController::class,'deny'])->name('cart.deny');
Route::get('/webadmin/cart/acceptedOrder',[CartController::class,'acceptedOrder'])->name('cart.acceptedOrder');
Route::get('/webadmin/cart/acceptedOrder/delete/{id}',[CartController::class,'delete'])->name('cart.delete');

//other
Route::get('/home/{id}/contact',[HomeController::class,'contact'])->name('home.contact');