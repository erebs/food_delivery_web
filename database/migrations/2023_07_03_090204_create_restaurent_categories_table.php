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
        Schema::create('restaurent_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('added_by', 5)->nullable();
            $table->string('category', 50)->nullable();
            $table->string('image', 100)->nullable();   
            $table->string('desc', 100)->nullable();
            $table->string('status', 20)->nullable();
            $table->string('block_reason', 500)->nullable();
            $table->integer('disp_order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurent_categories');
    }
};
