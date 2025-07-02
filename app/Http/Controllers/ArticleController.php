<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Menampilkan daftar artikel.
     */
    public function index()
    {
        // TODO: Implementasi logika untuk mengambil dan menampilkan daftar artikel
        return view('articles.index'); // Pastikan Anda memiliki file resources/views/articles/index.blade.php
    }

    // TODO: Tambahkan method lain seperti show, create, store, edit, update, destroy
}