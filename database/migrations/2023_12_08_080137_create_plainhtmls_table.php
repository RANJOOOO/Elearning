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
        Schema::create('plainhtmls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adminPage_id')->constrained('multiplepages')->onDelete('cascade');
            $table->longText('Title');
            $table->longText('html_code');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plainhtmls');
    }
};
