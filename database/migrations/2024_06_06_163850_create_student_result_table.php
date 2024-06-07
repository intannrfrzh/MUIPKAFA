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
        Schema::create('student_result', function (Blueprint $table) {
            $table->string('R_Result_ID')->primary();
            $table->string('SR_Student_ID');
            $table->string('T_Teacher_ID');
            $table->string('S_Subject_ID');
            $table->string('R_Result_grade');
            $table->string('R_Result_Verfication');

            $table->foreign('SR_Student_ID')->references('SR_Student_ID')->on('student_registration');
            $table->foreign('T_Teacher_ID')->references('T_Teacher_ID')->on('teacher');
            $table->foreign('S_Subject_ID')->references('S_Subject_ID')->on('subject');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_result');
    }
};
