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
            $table->jsonb('tree_structure_status');
            $table->jsonb('tree_structure_history');
            $table->rememberToken();
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
