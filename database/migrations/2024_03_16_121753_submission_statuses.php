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
        Schema::create('submission_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')
                ->nullable()
                ->references('id')
                ->on('roles')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('submission_id')
                ->nullable()
                ->references('id')
                ->on('submissions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->boolean('status')->default(false);
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submission_statuses');
    }
};
