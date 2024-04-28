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
        Schema::create('articlefavoris', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('created_by')->unsigned(); // Ensure unsigned if users.id is unsigned
            $table->bigInteger('article_id')->unsigned(); // Ensure unsigned if articles.id is unsigned
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articlefavoris');
    }
};
