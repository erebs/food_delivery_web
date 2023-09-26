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
        Schema::create('food_variants', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('item', 5)->nullable();
            $table->integer('is_default')->nullable();
            $table->string('variant', 100)->nullable();
            $table->string('normal_price', 10)->nullable();
            $table->string('is_offer', 10)->nullable();
            $table->string('offer_percentage', 10)->nullable();
            $table->string('offer_price', 10)->nullable();
            $table->string('status', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_variants');
    }
};
