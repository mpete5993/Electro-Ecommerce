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
});


Route::get('/admin', function () {
    return 'you are admin';
})->middleware(['auth', 'auth.admin']);

//Shop
Route::get('/store', [App\Http\Controllers\StoreController::class, 'index'])->name('store');
Route::get('/store/{product}', [App\Http\Controllers\StoreController::class, 'show'])->name('store.show');
Route::get('/search', [App\Http\Controllers\StoreController::class, 'search'])->name('search');

//Blog
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post}', [App\Http\Controllers\BlogController::class, 'show'])->name('post.show');


Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* ############ admin  ##############*/
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){

   
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', 'UserController' , ['except' => ['show', 'create', 'store']]);
    Route::resource('categories', 'CategoryController' , ['except' => ['show']]);
    Route::resource('tags', 'TagController' , ['except' => ['show']]);
    Route::resource('posts', 'PostController' , ['except' => ['show']]);
    Route::resource('products', 'ProductController' , ['except' => ['show']]);

});
/* ############ admin ##############*/