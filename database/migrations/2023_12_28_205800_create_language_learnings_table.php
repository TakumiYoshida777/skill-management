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
        Schema::create('language_learnings', function (Blueprint $table) {
            $table->uuid('id',36)->primary();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->string('mst_lang')->comment('対象の言語')->nullable(false);
            $table->unsignedTinyInteger('learning_status')->comment('(0:初級 1:中級 2:上級)')->nullable(false);
            $table->date('start_date')->nullable(false);
            $table->date('end_date')->nullable();
            $table->integer('total_time')->nullable();
            $table->text('learning_method')->nullable();
            $table->string('skills_acquired', 255)->nullable();
            $table->string('memo', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_learnings');
    }
};
