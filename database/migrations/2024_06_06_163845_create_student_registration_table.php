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
        Schema::create('student_registration', function (Blueprint $table) {
            $table->string('User_ID');
            $table->string('K_Admin_ID');
            $table->string('S_Subject_ID');
            $table->string('I_Parent_ID');
            $table->string('SR_Student_Name')->primary();;
            $table->string('SR_Student_IC');
            $table->string('SR_Student_gender');
            $table->string('SR_Student_phone_no');

            $table->foreign('User_ID')->references('User_ID')->on('users');
            $table->foreign('K_Admin_ID')->references('User_ID')->on('kafa_admin');
            $table->foreign('S_Subject_ID')->references('S_Subject_ID')->on('subject');
            $table->foreign('I_Parent_ID')->references('User_ID')->on('parent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_registration');
    }
};
