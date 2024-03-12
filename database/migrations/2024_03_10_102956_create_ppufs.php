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
        Schema::create('ppufs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')
                ->nullable()
                ->references('id')
                ->on('roles')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('ppuf_number');
            $table->foreignId('iku1_id')
                ->nullable()
                ->references('id')
                ->on('iku1')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('iku2_id')
                ->nullable()
                ->references('id')
                ->on('iku2')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('iku3_id')
                ->nullable()
                ->references('id')
                ->on('iku3')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('activity_type');
            $table->string('program_name');
            $table->string('description');
            $table->string('execution_location');
            $table->string('execution_time');
            $table->string('planned_expenditure');
            $table->string('detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppufs');
    }
};
