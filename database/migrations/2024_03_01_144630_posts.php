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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id'); // category_id
            $table->foreignId('user_id'); // user_id
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('seri_laptop')->default('Not found');
            $table->string('processor')->default('Not found');
            $table->string('graphic_card')->default('Not found');
            $table->string('ram')->default('Not found');
            $table->string('storage')->default('Not found');
            $table->string('port')->default('Not found');
            $table->string('os')->default('Not found');
            $table->double('price')->nullable();
            // $table->string('image')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

