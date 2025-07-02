<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\NutritionController; // Jika Anda membuat ini
use App\Http\Controllers\ChatbotController;   // Jika Anda membuat ini
use App\Http\Controllers\ChallengeController; // Jika Anda membuat ini
use App\Http\Controllers\RecommendationController; // Jika Anda membuat ini

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

// Halaman Utama PHCM Anda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute yang Dilindungi (akses setelah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // Halaman dashboard default dari Breeze
    })->name('dashboard');

    // Contoh rute untuk profil pengguna (Anda akan membuat ProfileController)
    Route::get('/profil', function () { return view('profile.index'); })->name('profile.index');
});

// Resource Routes (untuk CRUD)
Route::resource('resep', RecipeController::class);
Route::resource('artikel', ArticleController::class);
Route::resource('forum', ForumController::class);
Route::resource('tantangan', ChallengeController::class); // Jika diterapkan
// ... tambahkan resource untuk fitur lain yang memerlukan CRUD

// Rute Halaman Statis / Fitur Khusus (belum tentu CRUD lengkap)
Route::get('/resep-populer', [RecipeController::class, 'popular'])->name('recipes.popular');
Route::get('/kalkulator-gizi', [NutritionController::class, 'showCalculator'])->name('nutrition.calculator');
Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
Route::get('/rekomendasi', [RecommendationController::class, 'index'])->name('recommendations.index');
Route::get('/tentang', function () { return view('about'); })->name('about');
Route::get('/bantuan', function () { return view('help'); })->name('help');
Route::get('/ketentuan', function () { return view('terms'); })->name('terms');
Route::get('/privasi', function () { return view('privacy'); })->name('privacy');

// HAPUS atau KOMENTARI rute ini karena sudah ada rute '/' di atas
// Route::get('/', function () {
//     return view('welcome');
// });


// Jika Anda menggunakan Laravel Breeze, rute autentikasi akan otomatis dimasukkan di file routes/auth.php
// Tetapi link ke login/register sudah dipanggil di navbar.blade.php.
require __DIR__.'/auth.php'; // Ini disertakan oleh Breeze