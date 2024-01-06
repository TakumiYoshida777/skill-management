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
        Schema::create('management_search_histories', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('lang')->nullable();
            $table->string('framework')->nullable();
            $table->string('db')->nullable();
            $table->string('server_os')->nullable();
            $table->unsignedTinyInteger('project_manager_flag')->default(0);
            $table->unsignedTinyInteger('project_reader_flag')->default(0);
            $table->unsignedTinyInteger('programming_flag')->default(0);
            $table->unsignedTinyInteger('system_migration_flag')->default(0);
            $table->unsignedTinyInteger('operation_maintenance_flag')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('management_search_histories');
    }
};
