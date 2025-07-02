<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Menampilkan daftar thread forum.
     */
    public function index()
    {
        // TODO: Implementasi logika untuk mengambil dan menampilkan daftar thread forum
        return view('forum.index'); // Pastikan Anda memiliki file resources/views/forum/index.blade.php
    }

    // TODO: Tambahkan method lain seperti show, create, store, addPost (untuk komentar), dll.
}