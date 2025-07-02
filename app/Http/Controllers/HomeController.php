<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; // Pastikan baris ini ada untuk mengimpor model Article
use Illuminate\Support\Str; // Tambahkan ini jika Anda menggunakan Str::limit() di view

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 3 artikel terbaru
        // Pastikan Anda sudah menjalankan php artisan make:model Article -m
        // dan php artisan migrate untuk membuat tabel 'articles'
        $latestArticles = Article::latest()->take(3)->get();

        // Kirim variabel $latestArticles ke view 'home'
        return view('home', compact('latestArticles'));
    }
}