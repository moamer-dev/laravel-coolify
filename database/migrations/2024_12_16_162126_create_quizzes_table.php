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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->enum('type', ['assessment', 'interview', 'course', 'challenge'])->nullable();
            $table->boolean('is_timed')->default(0);
            $table->integer('duration')->nullable();
            $table->enum('duration_unit', ['minutes', 'hours'])->nullable();
            $table->integer('passing_score')->nullable()->default(0);
            $table->integer('retake_attempts')->nullable()->default(0);
            $table->boolean('is_reviewable')->default(false);
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};