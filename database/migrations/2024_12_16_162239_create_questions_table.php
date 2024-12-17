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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->enum('type', ['single', 'multiple_choice', 'true_false']);
            $table->enum('level', ['beginner', 'intermediate', 'advanced']);
            $table->integer('points')->nullable();
            $table->text('explanation')->nullable();
            $table->boolean('has_image')->default(false);
            $table->string('question_image')->nullable();
            $table->boolean('has_video')->default(false);
            $table->enum('video_source', ['youtube', 'vimeo', 'file'])->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('vimeo_url')->nullable();
            $table->string('file_path')->nullable();
            $table->unsignedBigInteger('quiz_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->boolean('is_active')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('quiz_id')->references('id')->on('quizzes');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};