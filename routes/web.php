<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/redirect',[HomeController::class,'redirect']);

Route::get('/',[HomeController::class,'index']);    
Route::get('/search',[HomeController::class,'search'])->name('search');  
Route::get('/produits/{id}', [ProductController::class, 'show'])->name('produits.show');
Route::post('/addcart/{id}', [HomeController::class, 'cart'])->name('produits.add');;
Route::post('/order', [HomeController::class, 'confirmorder']);
Route::get('/deletecartproduct/{id}',[HomeController::class,'destroy']);
Route::delete('/product/{id}', [HomeController::class,'delete'])->name('deleteProduct');
Route::get('/showcart', [HomeController::class, 'showcart']);

Route::get('/product',[AdminController::class,'product']);
Route::get('/showproduct',[AdminController::class,'showproduct']);
Route::get('/deleteproduct/{id}',[ProductController::class,'destroy']);
Route::put('/updateproduct/{id}', [ProductController::class, 'update'])->name('updateproduct');




Route::get('/updateview/{id}',[ProductController::class,'edit']);
Route::get('/updatestatus/{id}',[AdminController::class,'updatestatus']);
Route::delete('/remove-from-cart',[HomeController::class,'removeFromCart'])->name('cart.remove');
Route::get('/orderlist',[AdminController::class,'showorder']);
//Route::post('/uploadproduct',[AdminController::class,'uploadproduct']);

Route::post('/product/upload', [ProductController::class, 'store'])->name('ajouter.create');;

require __DIR__.'/auth.php';
