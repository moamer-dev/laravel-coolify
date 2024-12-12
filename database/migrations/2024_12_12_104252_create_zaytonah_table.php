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
        Schema::create('zaytonahs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_free')->default(false);
            $table->boolean('has_video')->default(true);
            $table->enum('video_source', ['youtube', 'vimeo', 'file'])->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('vimeo_url')->nullable();
            $table->string('file_path')->nullable();
            $table->string('video_duration')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zaytonahs');
    }
};
