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
            $table->foreignId('role_id')
                ->nullable()
                ->references('id')
                ->on('roles')
                ->cascadeOnUpdate()
                ->nullOnDelete();
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
            $table->string('background');
            $table->string('speaker')->nullable();
            $table->string('participant')->nullable();
            $table->string('rundown')->nullable();
            $table->string('place');
            $table->string('date');
            $table->string('vendor')->nullable();
            $table->string('budget');
            $table->jsonb('budget_detail');
            $table->string('approved_budget')->nullable()->default(0);
            $table->string('report_file')->nullable();
            $table->boolean('is_disbursement_complete')->default(false);
            $table->boolean('is_done')->default(false);
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
