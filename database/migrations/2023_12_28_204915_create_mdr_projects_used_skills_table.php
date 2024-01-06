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
            $table->foreignUuid('project_id', 36)->index()->constrained()->onDelete('cascade');
            $table->string('mst_os', 100);
            $table->string('mst_server', 100);
            $table->string('mst_database', 100);
            $table->string('mst_lang', 100);
            $table->string('mst_framework', 100);
            $table->string('mst_middleware', 100);
            $table->string('mst_version_management', 100);
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
