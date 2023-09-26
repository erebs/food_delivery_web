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
        Schema::create('restaurent_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('added_by', 5)->nullable();
            $table->string('catid', 5)->nullable();
            $table->string('item', 200)->nullable();
            $table->string('type', 50)->nullable();
            $table->string('is_recommendable', 10)->nullable();
            $table->string('is_newarrival', 10)->nullable();
            $table->string('is_customize', 10)->nullable();
            $table->string('normal_price', 10)->nullable();
            $table->string('is_offer', 10)->nullable();
            $table->string('offer_percentage', 10)->nullable();
            $table->string('offer_price', 10)->nullable();
            $table->string('image', 100)->nullable();   
            $table->longText('desc')->nullable();
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
        Schema::dropIfExists('restaurent_items');
    }
};
