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
        Schema::create('run_states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('run_id')->constrained('runs')->cascadeOnDelete();
            $table->unsignedBigInteger('iteration');
            $table->timestampTz('simulated_time');
            $table->decimal('cash', 30, 8);
            $table->decimal('total_value', 30, 8);
            /**
             * positions example:
             * {
             *   "1": { "quantity": 100, "avg_price": 150.25, "market_price": 152.10 },
             *   "3": { "quantity": -2, "avg_price": 1925.00 }
             * }
             */
            $table->json('positions');
            /**
             * metrics example:
             * {
             *   "drawdown": 0.12,
             *   "exposure": 0.65,
             *   "leverage": 1.8
             * }
             */
            $table->json('metrics')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Guarantees deterministic history
            $table->unique(['run_id', 'iteration']);

            // Common access patterns
            $table->index(['run_id', 'simulated_time']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('run_states');
    }
};
