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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ppuf_id')
                ->nullable()
                ->references('id')
                ->on('ppufs')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('background',);
            $table->string('participant',);
            $table->string('place',);
            $table->string('date',);
            $table->string('speaker',);
            $table->string('rundown',);
            $table->string('budget',);
            $table->string('vendor',);
            $table->timestamps();
            $table->softDeletesTz('deleted_at', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
