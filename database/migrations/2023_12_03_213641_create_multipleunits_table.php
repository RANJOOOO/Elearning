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
        Schema::create('multipleunits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adminSection_id')->constrained('multiplecourses')->onDelete('cascade');
            $table->string("unitName",30);
            $table->string("unitTitle",30);
            $table->string("description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multipleunits');
    }
};
