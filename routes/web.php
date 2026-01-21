<?php

use App\Http\Controllers\VinylController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommunityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/favorieten', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorieten/{vinyl}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorieten/{favorite}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
});

Route::get('/collectie', [VinylController::class, 'index'])->name('collectie');
Route::get('/collectie/{vinyl}', [VinylController::class, 'show'])->name('vinyl.show');

Route::get('/community', [CommunityController::class, 'index'])->name('community.index');
Route::post('/community', [CommunityController::class, 'store'])->name('community.store');
Route::delete('/community/{post}', [CommunityController::class, 'destroy'])
    ->middleware('auth')
    ->name('community.destroy');  // ✅ name toegevoegd

Route::get('/over-ons', fn () => view('pages.about'))->name('about');
Route::get('/contact', fn () => view('pages.contact'))->name('contact');

Route::get('/api/vinyls/search', [App\Http\Controllers\VinylController::class, 'search']);

Route::get('/winkelmand', [CartController::class, 'index'])->name('cart.index');
Route::post('/winkelmand/add/{vinyl}', [CartController::class, 'add'])->name('cart.add');
Route::post('/winkelmand/update/{vinyl}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/winkelmand/remove/{vinyl}', [CartController::class, 'remove'])->name('cart.remove');


require __DIR__.'/auth.php';
