<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\RecommendationController;

// Hapus ini, karena Carbon dan Str di-handle di Controller, bukan di file web.php lagi.
// use Illuminate\Support\Str;
// use Carbon\Carbon;

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
// Ini sudah mencakup semua rute untuk resep, artikel, dan forum (index, show, create, store, edit, update, destroy).
// Middleware 'auth' untuk 'forum' (create, store, dll.) akan di-handle di ForumController.__construct().
Route::resource('resep', RecipeController::class);
Route::resource('artikel', ArticleController::class);
Route::resource('forum', ForumController::class);

// Rute Halaman Statis / Fitur Khusus (belum tentu CRUD lengkap)
Route::get('/resep-populer', [RecipeController::class, 'popular'])->name('recipes.popular');
Route::get('/kalkulator-gizi', [NutritionController::class, 'showCalculator'])->name('nutrition.calculator');
Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
Route::get('/rekomendasi', [RecommendationController::class, 'index'])->name('recommendations.index');
Route::get('/tentang', function () { return view('about'); })->name('about');
Route::get('/bantuan', function () { return view('help'); })->name('help');
Route::get('/ketentuan', function () { return view('terms'); })->name('terms');
Route::get('/privasi', function () { return view('privacy'); })->name('privacy');

// Route untuk Login dan Register (Ini biasanya sudah ditangani oleh Laravel Breeze melalui auth.php)
// Pastikan view 'auth.login' dan 'auth.register' ada jika Anda menggunakan Breeze.
Route::get('/login', function() { return view('auth.login'); })->name('login');
Route::get('/register', function() { return view('auth.register'); })->name('register');

// Ini disertakan oleh Breeze. Biarkan ini.
require __DIR__.'/auth.php';

// =====================================================================
// BAGIAN DI BAWAH INI ADALAH DUPLIKASI DAN DATA DUMMY YANG SUDAH DIHAPUS
// =====================================================================

// Rute forum/{slug} yang berisi data dummy dan Carbon::parse() - INI SUDAH DIHAPUS
// Karena sudah ditangani oleh ForumController@show melalui Route::resource('forum', ForumController::class);
/*
Route::get('/forum/{slug}', function ($slug) {
    // ... (data dummy forumPosts) ...
    $post = collect($forumPosts)->firstWhere('slug', $slug);
    if (!$post) { abort(404, 'Diskusi tidak ditemukan.'); }
    return view('forum.show', compact('post'));
})->name('forum.show');
*/

// Rute resep/{slug} yang berisi data dummy dan Carbon::parse() - INI SUDAH DIHAPUS
// Karena sudah ditangani oleh RecipeController@show melalui Route::resource('resep', RecipeController::class);
/*
Route::get('/resep/{slug}', function ($slug) {
    // ... (data dummy recipes) ...
    $recipe = collect($recipes)->firstWhere('slug', $slug);
    if (!$recipe) { abort(404, 'Resep tidak ditemukan.'); }
    return view('recipes.show', compact('recipe'));
})->name('resep.show');
*/

// Rute artikel/{slug} yang berisi data dummy dan Carbon::parse() - INI SUDAH DIHAPUS
// Karena sudah ditangani oleh ArticleController@show melalui Route::resource('artikel', ArticleController::class);
/*
Route::get('/artikel/{slug}', function ($slug) {
    // ... (data dummy articles) ...
    $article = collect($articles)->firstWhere('slug', $slug);
    if (!$article) { abort(404, 'Artikel tidak ditemukan.'); }
    return view('articles.show', compact('article'));
})->name('artikel.show');
*/

// Rute duplikat untuk resep dan artikel (index & show) - INI SUDAH DIHAPUS
// Karena sudah ditangani oleh Route::resource masing-masing.
/*
Route::get('/resep', [RecipeController::class, 'index'])->name('resep.index');
Route::get('/resep/{slug}', [RecipeController::class, 'show'])->name('resep.show');
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('artikel.show');
*/

// Rute duplikat untuk forum (index, show, create, store) - INI SUDAH DIHAPUS
// Karena sudah ditangani oleh Route::resource('forum', ForumController::class);
// dan middleware di ForumController.__construct().
/*
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/{slug}', [ForumController::class, 'show'])->name('forum.show');
Route::middleware('auth')->group(function () {
    Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
});
*/
