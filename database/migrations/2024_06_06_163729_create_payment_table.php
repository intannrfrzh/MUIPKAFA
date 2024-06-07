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
        Schema::create('payment', function (Blueprint $table) {
            $table->string('P_Payment_ID')->primary();
            $table->string('I_Parent_ID');
            $table->integer('P_Payment_total');
            $table->date('P_Payment_date');
            $table->time('P_Payment_time');
            $table->string('P_Payment_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
