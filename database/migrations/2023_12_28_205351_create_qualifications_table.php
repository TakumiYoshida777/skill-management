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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->uuid('id',36)->primary();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->string('qualifications_name', 255);
            $table->text('description');
            $table->string('issuing_authority', 255);
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->string('related_skills');
            $table->text('other_details');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifications');
    }
};
