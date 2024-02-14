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
        Schema::create('academic_details', function (Blueprint $table) {
            $table->id();
            $table->string('institute_name');
            $table->dath('admisstion_date');
            $table->string('roll_no')->unique();
            $table->unsignedBigInteger('classroom_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('student_infos_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('section_id')->references('id')->on('sections')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('group_id')->references('id')->on('groups')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('student_infos_id')->references('id')->on('student_infos')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_details');
    }
};
