<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    /**
     * Menampilkan halaman chatbot.
     */
    public function index()
    {
        // TODO: Implementasi logika untuk menampilkan interface chatbot
        return view('chatbot.index'); // Pastikan Anda memiliki file resources/views/chatbot/index.blade.php
    }

    /**
     * Mengirim pesan ke chatbot dan mendapatkan balasan.
     */
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        // TODO: Implementasi logika chatbot (misal: keyword matching, integrasi AI)
        $response = "Maaf, saya masih belajar. Anda mengatakan: " . $message;
        return response()->json(['reply' => $response]);
    }
}