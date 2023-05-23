<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categorie/{categorie}', [HomeController::class, 'show'])->name('categorie.product.show');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/search', [ProduitsController::class, 'search'])->name('products.search');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // admin dashboard
    Route::get('/' ,[AdminController::class,'index'])->name('index');
    // users crud
    Route::get('/users',[UserController::class, 'index'])->name('users.show');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
    //categorie
    Route::get('/categorie',[CategorieController::class,'index'])->name('categorie.show');
    Route::get('/categorie/create',[CategorieController::class, 'create'])->name('categorie.create');
    Route::post('/categorie/store',[CategorieController::class,'store'])->name('categorie.store');
    Route::get('/categorie/{categorie}/edit',[CategorieController::class,'edit'])->name('categorie.edit');
    Route::put('/categorie/{categorie}/update',[CategorieController::class,'update'])->name('categorie.update');
    Route::delete('/categorie/{categorie}/delete',[CategorieController::class,'destroy'])->name('categorie.destroy');

    //Produits
    Route::get('/produit', [ProduitsController::class, 'index'])->name('produit.show');
    Route::get('/produit/create',[ProduitsController::class,'create'])->name('produit.create');
    Route::post('/produit/store',[ProduitsController::class,'store'])->name('produit.store');
    Route::get('/produit/{produit}/edit',[ProduitsController::class,'edit'])->name('produit.edit');
    Route::put('/produit/{produit}/update',[ProduitsController::class,'update'])->name('produit.update');
    Route::delete('/produit/{product}/delete',[ProduitsController::class,'destroy'])->name('produit.destroy');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/cart',[CartController::class, 'index'])->name('cart.show');
    Route::get('/product',[ProductController::class, 'index'])->name('produit.show');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.addToCart');

    // Route::post('/add-to-cart', [ProductController::class, 'addToCart'])->name('products.addToCart');

    
});
require __DIR__.'/auth.php';
