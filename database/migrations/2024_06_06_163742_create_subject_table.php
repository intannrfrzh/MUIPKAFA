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
        Schema::create('subject', function (Blueprint $table) {
            $table->string("S_Subject_ID")->primary();
            $table->string("T_Teacher_ID");
            $table->string('S_Subject_name');
            
            $table->foreign("T_Teacher_ID")->references("T_Teacher_ID")->on("teacher");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject');
    }
};
