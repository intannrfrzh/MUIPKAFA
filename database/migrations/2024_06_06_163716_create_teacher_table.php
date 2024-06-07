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
            $table->string("T_Teacher_ID")->primary();
            $table->string("T_Teacher_name");
            $table->string("T_Teacher_IC");
            $table->string("T_Teacher_email");
            $table->string("T_Teacher_phone_no");
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
