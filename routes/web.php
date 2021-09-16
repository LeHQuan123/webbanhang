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

Route::get('/',[App\Http\Controllers\FrontendController::class, 'getHome'])->name('getHome');
Route::get('/details/{id}/{slug}.html',[App\Http\Controllers\FrontendController::class, 'details'])->name('details');
Route::post('/details/{id}/{slug}.html',[App\Http\Controllers\FrontendController::class, 'postComment'])->name('postComment');
Route::get('/category/{id}/{slug}.html',[App\Http\Controllers\FrontendController::class, 'getCate'])->name('getCate');
Route::get('/search',[App\Http\Controllers\FrontendController::class, 'getSearch'])->name('getSearch');

Route::prefix('cart')->group(function(){

	Route::get('/add/{id}', [App\Http\Controllers\CartController::class,  'getAddCart'])->name('getAddCart');
	Route::get('/show', [App\Http\Controllers\CartController::class,  'showCart'])->name('showCart');
	Route::get('/delete/{id}', [App\Http\Controllers\CartController::class,  'deleteCart'])->name('deleteCart');
	Route::get('/update',[App\Http\Controllers\CartController::class,  'updateCart'])->name('updateCart');
	Route::post('/show',[App\Http\Controllers\CartController::class,  'postMail'])->name('postMail');
	Route::get('/complete',[App\Http\Controllers\CartController::class,  'complete'])->name('complete');
	
});



Route::get('login', [App\Http\Controllers\Admin\LoginController::class, 'getLogin'])->name('getLogin');
Route::post('login', [App\Http\Controllers\Admin\LoginController::class, 'postLogin'])->name('postLogin');

Route::prefix('admin')->group(function () {
    Route::get('home', [App\Http\Controllers\Admin\HomeController::class, 'home'])->name('home');
	Route::get('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('logout'); 
	Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'getCate'])->name('getCate'); 
	Route::prefix('category')->group(function()
	{
		Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'getCate'])->name('getCate'); 
		Route::post('/', [App\Http\Controllers\Admin\CategoryController::class, 'postCate'])->name('postCate'); 
		Route::get('edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'getEditCate'])->name('getEditCate');
		Route::get('edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'postEditCate'])->name('postEditCate');
		Route::get('delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'getDeleteCate'])->name('getDeleteCate');
		
	});
	Route::prefix('product')->group(function()
	{
		Route::get('/', [App\Http\Controllers\Admin\ProductController::class, 'getProduct'])->name('getProduct'); 
		Route::get('/addpro', [App\Http\Controllers\Admin\ProductController::class, 'getAddProduct'])->name('getAddProduct'); 

		Route::post('/addpro', [App\Http\Controllers\Admin\ProductController::class, 'postAddProduct'])->name('postAddProduct'); 
		Route::get('edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'getEditProduct'])->name('getEditProduct');
		Route::get('edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'EditProduct'])->name('EditProduct');
		Route::post('edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'updateProduct'])->name('updateProduct');
		Route::get('delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'DeleteProduct'])->name('DeleteProduct');
		
	});

});






