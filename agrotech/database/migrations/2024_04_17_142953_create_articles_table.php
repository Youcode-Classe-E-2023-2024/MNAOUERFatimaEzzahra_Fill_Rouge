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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('picture');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('comment_id');
            $table->unsignedBigInteger('categories_id');
            $table->timestamps();

            $table->foreign('categories_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreign('tags_id')->references('id')->on('tags')->cascadeOnUpdate();
            $table->foreign('created_by')->references('id')->on('users')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
