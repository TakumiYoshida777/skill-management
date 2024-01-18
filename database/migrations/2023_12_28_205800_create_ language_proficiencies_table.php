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
        Schema::create('language_proficiencies', function (Blueprint $table) {
            $table->uuid('id',36)->primary();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->string('name')->comment('対象の言語')->nullable(false);
            $table->text('learning_method')->nullable();
            $table->float('total_date')->nullable();
            $table->unsignedTinyInteger('read_status')->comment('読む(0:初級 1:中級 2:上級)')->nullable(false);
            $table->unsignedTinyInteger('write_status')->comment('書く(0:初級 1:中級 2:上級)')->nullable(false);
            $table->unsignedTinyInteger('conversation_status')->comment('会話(0:初級 1:中級 2:上級)')->nullable(false);
            $table->string('memo', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_proficiencies');
    }
};
