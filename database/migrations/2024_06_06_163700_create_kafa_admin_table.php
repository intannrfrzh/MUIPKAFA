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
        Schema::create('kafa_admin', function (Blueprint $table) {
            $table->string("K_Admin_ID")->primary(); 
            $table->string("K_Admin_name");
            $table->string("K_Admin_IC");
            $table->string("K_Admin_email");
            $table->string("K_Admin_phone_no");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kafa_admin');
    }
};
