<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    /**
     * Menampilkan rekomendasi resep.
     */
    public function index()
    {
        // TODO: Implementasi logika untuk menghasilkan dan menampilkan rekomendasi resep
        return view('recommendations.index'); // Pastikan Anda memiliki file resources/views/recommendations/index.blade.php
    }
}