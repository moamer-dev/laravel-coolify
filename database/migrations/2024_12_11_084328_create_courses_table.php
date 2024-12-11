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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('short_title')->nullable();
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->json('tags')->nullable();
            $table->string('feature_image')->nullable();
            $table->string('promo_video')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('duration')->nullable();
            $table->enum('status', ['draft', 'published', 'unpublished'])->default('draft');
            $table->enum('price_type', ['paid', 'free']);
            $table->enum('discount_type', ['fixed_amount', 'percentage'])->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->decimal('discount_percentage', 5, 2)->nullable();
            $table->decimal('tax', 10, 2)->nullable();
            $table->decimal('vat', 10, 2)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_best_seller')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('currency_id')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};