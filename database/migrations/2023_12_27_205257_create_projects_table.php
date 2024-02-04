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
            $table->id();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->string('name', 50);
            $table->string('description', 255);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('team_size')->comment('人数');
            $table->integer('all_team_size')->comment('全体人数');
            $table->string('position', 50)->comment('役割');
            $table->boolean('requirement_definition_flag')->default(false)->comment('要件定義のステータス (false: 非担当, true: 担当)');
            $table->boolean('basic_design_flag')->default(false)->comment('基本設計のステータス (false: 非担当, true: 担当)');
            $table->boolean('detailed_design_flag')->default(false)->comment('詳細設計のステータス (false: 非担当, true: 担当)');
            $table->boolean('db_design_flag')->default(false)->comment('DB設計のステータス (false: 非担当, true: 担当)');
            $table->boolean('programming_flag')->default(false)->comment('プログラミングのステータス (false: 非担当, true: 担当)');
            $table->boolean('unit_testing_flag')->default(false)->comment('単体テストのステータス (false: 非担当, true: 担当)');
            $table->boolean('integration_testing_flag')->default(false)->comment('結合テストのステータス (false: 非担当, true: 担当)');
            $table->boolean('system_testing_flag')->default(false)->comment('システムテストのステータス (false: 非担当, true: 担当)');
            $table->boolean('operation_testing_flag')->default(false)->comment('運用テストのステータス (false: 非担当, true: 担当)');
            $table->boolean('system_migration_flag')->default(false)->comment('システム移行のステータス (false: 非担当, true: 担当)');
            $table->boolean('operation_maintenance_flag')->default(false)->comment('運用・保守のステータス (false: 非担当, true: 担当)');
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
