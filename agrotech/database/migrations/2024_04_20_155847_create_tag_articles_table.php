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
        Schema::create('tag_articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('articles_id');
            $table->unsignedBigInteger('tags_id');
            $table->timestamps();

            $table->foreign('articles_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');

            $table->unique(['articles_id', 'tags_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_articles');
    }
};
