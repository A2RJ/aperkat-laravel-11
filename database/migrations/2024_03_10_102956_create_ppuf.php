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
                ->references('id')
                ->on('roles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('ppuf_number');
            $table->string('iku_1');
            $table->string('iku_2');
            $table->string('iku_3');
            $table->string('activity_type');
            $table->string('program_name');
            $table->string('description');
            $table->string('execution_location');
            $table->string('execution_time');
            $table->string('planned_expenditure');
            $table->string('detail');
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
