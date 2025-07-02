<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    /**
     * Menampilkan daftar tantangan.
     */
    public function index()
    {
        // TODO: Implementasi logika untuk mengambil dan menampilkan daftar tantangan
        return view('challenges.index'); // Pastikan Anda memiliki file resources/views/challenges/index.blade.php
    }

    // TODO: Tambahkan method lain seperti show, submitEntry, dll.
}