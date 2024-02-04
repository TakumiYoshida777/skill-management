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
        Schema::create('mdr_projects_used_skills', function (Blueprint $table) {
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('os', 100);
            $table->string('server', 100);
            $table->string('database', 100);
            $table->string('lang', 100);
            $table->string('framework', 100);
            $table->string('middleware', 100);
            $table->string('version_management', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mdr_projects_used_skills');
    }
};
