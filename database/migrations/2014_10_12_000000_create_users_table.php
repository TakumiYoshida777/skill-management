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
            $table->uuid('id',36)->primary()->comment('ID');
            $table->string('employees',255)->unique()->comment('社員番号');
            $table->string('first_name',50)->comment('名');
            $table->string('first_name_kana_en',50)->comment('名（カナ）');
            $table->string('last_name_kana_en',50)->comment('姓（カナ）');
            $table->string('last_name',50)->comment('姓');
            $table->string('email',255)->unique()->comment('Eメール');
            $table->timestamp('email_verified_at')->nullable()->comment('Eメール認証日時');
            $table->date('birthdate')->comment('生年月日');
            $table->string('division',50)->nullable()->comment('部署');
            $table->string('position',50)->default('一般')->comment('役職');
            $table->string('section',50)->nullable()->comment('セクション');
            $table->integer('industry_experience_months')->nullable()->comment('業界経験月数');
            $table->string('password',255)->comment('パスワード');
            $table->boolean('project_manager_flag')->default(false)->comment('プロジェクトマネージャーフラグ');
            $table->boolean('project_leader_flag')->default(false)->comment('プロジェクトリーダーフラグ');
            $table->boolean('requirements_definition_flag')->default(false)->comment('要件定義フラグ');
            $table->boolean('basic_design_flag')->default(false)->comment('基本設計フラグ');
            $table->boolean('detailed_design_flag')->default(false)->comment('詳細設計フラグ');
            $table->boolean('development_flag')->default(false)->comment('開発フラグ');
            $table->boolean('unit_test_flag')->default(false)->comment('単体テストフラグ');
            $table->boolean('integration_test_flag')->default(false)->comment('結合テストフラグ');
            $table->boolean('system_test_flag')->default(false)->comment('システムテストフラグ');
            $table->string('pr')->comment('PR');
            $table->boolean('admin_flag')->default(false)->comment('管理者フラグ');
            $table->rememberToken()->comment('リメンバートークン');
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
