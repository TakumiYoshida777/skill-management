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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->date('birthdate')->nullable()->comment('生年月日');
            $table->string('division',50)->nullable()->comment('部署');
            $table->string('position',50)->default('一般')->comment('役職');
            $table->string('section',50)->nullable()->comment('課');
            $table->integer('industry_experience')->nullable()->comment('業界経験月数');
            $table->boolean('project_manager_flag')->default(false)->comment('プロジェクトマネージャーフラグ');
            $table->boolean('project_leader_flag')->default(false)->comment('プロジェクトリーダーフラグ');
            $table->boolean('requirement_definition_flag')->default(false)->comment('要件定義フラグ');
            $table->boolean('basic_design_flag')->default(false)->comment('基本設計フラグ');
            $table->boolean('detailed_design_flag')->default(false)->comment('詳細設計フラグ');
            $table->boolean('db_design_flag')->default(false)->comment('DB設計フラグ');
            $table->boolean('programming_flag')->default(false)->comment('開発フラグ');
            $table->boolean('unit_test_flag')->default(false)->comment('単体テストフラグ');
            $table->boolean('integration_test_flag')->default(false)->comment('結合テストフラグ');
            $table->boolean('system_test_flag')->default(false)->comment('総合テストフラグ');
            $table->boolean('operation_test_flag')->default(false)->comment('運用テストフラグ');
            $table->boolean('system_migration_flag')->default(false)->comment('システム移行フラグ');
            $table->boolean('operation_maintenance_flag')->default(false)->comment('運用・保守フラグ');
            $table->string('pr')->nullable()->comment('PR');
            $table->boolean('admin_flag')->default(false)->comment('管理者フラグ');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
