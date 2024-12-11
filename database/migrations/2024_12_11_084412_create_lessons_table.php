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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->string('name');
            //$table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->boolean('is_preview')->default(false);
            $table->boolean('has_video')->default(true);
            $table->enum('video_source', ['youtube', 'vimeo', 'file']);
            $table->string('youtube_url')->nullable();
            $table->string('vimeo_url')->nullable();
            $table->string('file_path')->nullable();
            $table->text('content')->nullable();
            $table->string('video_duration')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
