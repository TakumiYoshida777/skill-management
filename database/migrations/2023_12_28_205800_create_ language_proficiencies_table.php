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
            $table->id();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->string('name')->unique()->comment('対象の言語');
            $table->text('learning_method')->nullable();
            $table->float('total_months')->nullable();
            $table->unsignedTinyInteger('read_status')->comment('読む->unique()(0:初級 1:中級 2:上級)');
            $table->unsignedTinyInteger('write_status')->comment('書く->unique()(0:初級 1:中級 2:上級)');
            $table->unsignedTinyInteger('conversation_status')->comment('会話->unique()(0:初級 1:中級 2:上級)');
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
