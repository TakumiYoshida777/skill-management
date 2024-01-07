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
            $table->string('email',255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('birthdate');
            $table->string('division',50)->nullable();
            $table->string('position',50)->default('一般');
            $table->string('section',50)->nullable();
            $table->integer('industry_experience_months')->nullable();
            $table->string('password',255);
            $table->boolean('project_manager_flag')->default(false);
            $table->boolean('project_leader_flag')->default(false);
            $table->boolean('requirements_definition_flag')->default(false);
            $table->boolean('basic_design_flag')->default(false);
            $table->boolean('detailed_design_flag')->default(false);
            $table->boolean('development_flag')->default(false);
            $table->boolean('unit_test_flag')->default(false);
            $table->boolean('integration_test_flag')->default(false);
            $table->boolean('system_test_flag')->default(false);
            $table->string('pr');
            $table->boolean('admin_flag')->default(false);
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
