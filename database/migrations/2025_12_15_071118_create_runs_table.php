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
        Schema::create('runs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('experiment_id')->constrained('experiments')->cascadeOnDelete();

            $table->enum('status', ['created', 'running', 'paused', 'finished', 'failed'])->default('created');

            $table->unsignedBigInteger('random_seed')->nullable();
            $table->timestampTz('current_time')->nullable();
            $table->unsignedBigInteger('iteration')->default(0);

            $table->string('data_version')->nullable(); // candle snapshot/version

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('runs');
    }
};
