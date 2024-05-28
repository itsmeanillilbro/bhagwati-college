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
        Schema::create('subsubmenu', function (Blueprint $table) {
            $table->id();
            $table->string('submenutitle')->nullable();
            $table->string('subsubmenutitle')->nullable();
            $table->unsignedBigInteger('submenu_id');
            $table->foreign('submenu_id')->references('id')->on('submenu')->onDelete('cascade');
            $table->string('link')->nullable();
            $table->string('status')->default('draft');
            $table->string('author')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsubmenu');
    }
};
