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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->uuid('id',36)->primary();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->string('project_name', 255);
            $table->text('description');
            $table->string('app_url', 255)->nullable();
            $table->string('github_url', 255)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('memo', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
