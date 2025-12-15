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
        Schema::create('experiments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('preset_id')->nullable()->constrained('presets')->nullOnDelete();
            $table->foreignId('owner_user_id')->constrained('users')->cascadeOnDelete();

            $table->string('name');
            $table->text('description')->nullable();

            $table->timestampTz('start_time');
            $table->timestampTz('end_time');
            $table->unsignedInteger('tick_interval_seconds');

            $table->decimal('initial_cash', 24, 8);
            $table->json('settings')->nullable(); // frozen copy of preset + overrides

            $table->enum('status', ['draft', 'locked', 'running', 'finished'])->default('draft');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiments');
    }
};
