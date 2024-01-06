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
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id',36)->primary();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->string('project_name', 50);
            $table->string('description', 255);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('team_size');
            $table->string('position', 50);
            $table->unsignedTinyInteger('requirement_definition_flag')->default(0);
            $table->unsignedTinyInteger('design_flag')->default(0);
            $table->unsignedTinyInteger('programming_flag')->default(0);
            $table->unsignedTinyInteger('unit_testing_flag')->default(0);
            $table->unsignedTinyInteger('integration_testing_flag')->default(0);
            $table->unsignedTinyInteger('system_testing_flag')->default(0);
            $table->unsignedTinyInteger('operation_testing_flag')->default(0);
            $table->unsignedTinyInteger('system_migration_flag')->default(0);
            $table->unsignedTinyInteger('operation_maintenance_flag')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
