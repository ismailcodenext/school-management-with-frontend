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
        Schema::create('previous_institute_details', function (Blueprint $table) {
            $table->id();
            $table->string('institute_names');
            $table->string('class_name');
            $table->string('years');
            $table->unsignedBigInteger('student_infos_id');
            $table->unsignedBigInteger('user_id');
            // Foreign key relationships
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
        Schema::dropIfExists('previous_institute_details');
    }
};
