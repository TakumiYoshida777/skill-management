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
            $table->string('first_name',50)->comment('名');
            $table->string('first_name_kana',50)->comment('名_カナ');
            $table->string('last_name',50)->comment('姓');
            $table->string('last_name_kana',50)->comment('姓_カナ');
            $table->string('email',255)->unique()->comment('Eメール');
            $table->timestamp('email_verified_at')->nullable()->comment('Eメール認証日時');
            $table->string('password',255)->comment('パスワード');
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
