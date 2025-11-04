<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and are all assigned
| to the "web" middleware group. Make something great!
|
*/

// Redirect root URL to dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Authenticated user routes
Route::middleware(['auth'])->group(function () {

    // Dashboard page
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Product CRUD routes
    Route::resource('products', ProductController::class);
});

// If you installed Breeze (Blade version), these routes are auto-loaded:
// Authentication routes like:
// - /login
// - /register
// - /forgot-password
// - /reset-password
// - /email/verify
// - /profile
require __DIR__ . '/auth.php';
