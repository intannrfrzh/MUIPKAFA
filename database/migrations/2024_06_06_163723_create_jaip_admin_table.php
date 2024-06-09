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
            $table->string('User_ID');
            $table->string('J_Admin_name')->primary();;
            $table->string('J_Admin_IC');
            $table->string('J_Admin_email');
            $table->string('J_Admin_phone_number');

            $table->foreign('User_ID')->references('User_ID')->on('users');
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
