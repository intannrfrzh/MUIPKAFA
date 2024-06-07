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
        Schema::create('jaip_admin', function (Blueprint $table) {
            $table->string('J_Admin_ID')->primary();
            $table->string('J_Admin_name');
            $table->string('J_Admin_IC');
            $table->string('J_Admin_email');
            $table->string('J_Admin_phone_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jaip_admin');
    }
};
