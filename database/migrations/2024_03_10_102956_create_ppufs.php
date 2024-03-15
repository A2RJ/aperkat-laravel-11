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
            $table->string('iku');
            $table->string('ppuf_number');
            $table->string('activity_type');
            $table->string('program_name');
            $table->string('description');
            $table->string('location');
            $table->string('date');
            $table->string('planned_expenditure');
            $table->string('detail')->nullable();
            $table->timestamps();
            $table->softDeletesTz('deleted_at', precision: 0);
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
