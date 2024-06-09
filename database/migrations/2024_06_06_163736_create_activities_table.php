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
            $table->id();
            //$table->string('K_Admin_ID')->default('default_value');
            //$table->string('J_Admin_ID')->default('default_value');
            $table->string('A_Activity_name');
            $table->string('A_Activity_details');
            $table->date('A_Activity_datestart');
            $table->date('A_Activity_dateend');
            $table->time('A_Activity_timestart');
            $table->time('A_Activity_timeend');
            $table->string('A_Activity_status')->default('pending');

            
            $table->foreign('K_Admin_ID')->references('User_ID')->on('kafa_admin');
            $table->foreign('J_Admin_ID')->references('User_ID')->on('jaip_admin');
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
