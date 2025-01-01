<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //ini relasi antar table
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // foreign key constraints untuk author
            $table->foreignId('author_id')->constrained(
                table: 'users', 
                indexName: 'posts_author_id'
            );
            //-> ini relasi ke migrations categories
            $table->foreignId('category_id')->constrained(
                table: 'categories', 
                indexName: 'posts_category_id'
            );
            $table->string('slug')->unique();
            $table->text('body');
            $table->timestamps();
        });
        // end relasi
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
