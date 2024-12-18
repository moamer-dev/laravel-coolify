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
        Schema::create('learning_stack_technology_stack', function (Blueprint $table) {
            $table->id();
            $table->foreignId('learning_stack_id')->constrained()->onDelete('cascade');
            $table->foreignId('technology_stack_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_stack_technology_stack');
    }
};
