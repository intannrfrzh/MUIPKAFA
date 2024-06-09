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
        Schema::create('parent', function (Blueprint $table) {
            $table->string('User_ID');
            $table->string('I_Parent_name')->primary();;
            $table->string('I_Parent_IC');
            $table->string('I_Parent_email');
            $table->string('I_Parent_phone_number');

            $table->foreign('User_ID')->references('User_ID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent');
    }
};
