<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('run_id')->constrained('runs')->cascadeOnDelete();
            $table->foreignId('instrument_id')->constrained('instruments')->cascadeOnDelete();

            $table->enum('side', ['buy', 'sell'])->default('buy');
            $table->enum('type', ['market', 'limit'])->default('market');
            $table->decimal('quantity', 24, 8);
            $table->decimal('price', 24, 8)->nullable();

            $table->timestampTz('simulated_time');
            $table->enum('status', ['submitted', 'filled', 'partially_filled', 'canceled', 'rejected'])->default('submitted');

            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
