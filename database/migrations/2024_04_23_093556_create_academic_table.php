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
        Schema::create('academic', function (Blueprint $table) {
            $table->id();
            $table->string('academic_title')->nullable();
            $table->string('author')->nullable();
            $table->longText('academic_para')->nullable();
            $table->string('status')->default('draft');
            $table->string('academic_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic');
    }
};
