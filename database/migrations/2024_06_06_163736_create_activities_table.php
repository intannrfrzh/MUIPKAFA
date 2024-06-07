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
        Schema::create('activities', function (Blueprint $table) {
            $table->string('A_Activity_ID')->primary();
            $table->string('K_Admin_ID');
            $table->string('J_Admin_ID');
            $table->string('T_Teacher_ID');
            $table->string('A_Activity_name');
            $table->string('A_Activity_details');
            $table->date('A_Activity_date');
            $table->time('A_Activity_time');

            
            $table->foreign('K_Admin_ID')->references('K_Admin_ID')->on('kafa_admin');
            $table->foreign('J_Admin_ID')->references('J_Admin_ID')->on('jaip_admin');
            $table->foreign('T_Teacher_ID')->references('T_Teacher_ID')->on('teacher');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
