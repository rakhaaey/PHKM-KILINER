<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Menampilkan daftar resep.
     */
    public function index()
    {
        // TODO: Implementasi logika untuk mengambil dan menampilkan daftar resep
        return view('recipes.index'); // Pastikan Anda memiliki file resources/views/recipes/index.blade.php
    }

    /**
     * Menampilkan resep populer.
     */
    public function popular()
    {
        // TODO: Implementasi logika untuk mengambil dan menampilkan resep populer
        return view('recipes.popular'); // Buat file ini jika belum ada
    }

    // TODO: Tambahkan method lain seperti show, create, store, edit, update, destroy
}