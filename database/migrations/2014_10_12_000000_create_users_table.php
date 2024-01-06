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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id',36)->primary();
            $table->string('employees',255)->unique();
            $table->string('first_name',50);
            $table->string('first_name_kana_en',50);
            $table->string('last_name_kana_en',50);
            $table->string('last_name',50);
            $table->date('birthdate');
            $table->string('email',255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('division',50);
            $table->string('position',50);
            $table->string('section',50)->nullable();
            $table->string('position_description',255)->nullable();
            $table->integer('industry_experience_months');
            $table->string('password',255);
            $table->unsignedTinyInteger('project_manager_flag')->default(0);
            $table->unsignedTinyInteger('project_leader_flag')->default(0);
            $table->unsignedTinyInteger('requirements_definition_flag')->default(0);
            $table->unsignedTinyInteger('basic_design_flag')->default(0);
            $table->unsignedTinyInteger('detailed_design_flag')->default(0);
            $table->unsignedTinyInteger('development_flag')->default(0);
            $table->unsignedTinyInteger('unit_test_flag')->default(0);
            $table->unsignedTinyInteger('integration_test_flag')->default(0);
            $table->unsignedTinyInteger('system_test_flag')->default(0);
            $table->string('pr',255);
            $table->unsignedTinyInteger('admin_flag')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
