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
        Schema::create('gradian_infos', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('father_name');
            $table->string('father_mobile');
            $table->string('father_profession')->nullable();
            $table->string('father_image')->nullable();
            $table->string('mother_name');
            $table->string('mother_mobile');
            $table->string('mother_profession')->nullable();
            $table->string('mother_image')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_mobile')->nullable();
            $table->string('guardian_profession')->nullable();
            $table->string('guardian_image')->nullable();
            $table->string('guardian_email')->nullable();
            $table->string('guardian_address')->nullable();
            $table->string('guardian_relation')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('student_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->restrictOnDelete();
            // $table->foreign('student_id')->references('id')->on('student_infos')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gradian_infos');
    }
};
