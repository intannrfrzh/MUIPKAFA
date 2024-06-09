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
        Schema::create('teacher', function (Blueprint $table) {
            $table->string('User_ID');
            $table->string("T_Teacher_name")->primary();;
            $table->string("T_Teacher_IC");
            $table->string("T_Teacher_email");
            $table->string("T_Teacher_phone_no");

            $table->foreign('User_ID')->references('User_ID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher');
    }
};
