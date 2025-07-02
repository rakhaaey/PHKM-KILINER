<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->longText('ingredients'); // Simpan sebagai JSON/teks sederhana
            $table->longText('instructions'); // Simpan sebagai JSON/teks sederhana
            $table->string('image_url')->nullable();
            $table->integer('cooking_time')->nullable(); // in minutes
            $table->integer('prep_time')->nullable(); // in minutes
            $table->string('difficulty')->nullable(); // e.g., 'easy', 'medium', 'hard'
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Pemilik resep
            $table->unsignedBigInteger('category_id')->nullable(); // Jika ada kategori resep
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};