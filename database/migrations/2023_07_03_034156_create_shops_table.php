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
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('franchise_id', 5)->nullable();
            $table->string('shop_type', 50)->nullable();
            $table->string('shop_name', 100)->nullable();   
            $table->string('proprietor', 100)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->rememberToken();
            $table->string('mail_id', 100)->nullable();
            $table->string('location', 100)->nullable();
            $table->string('address', 1000)->nullable();
            $table->string('pincode', 20)->nullable();
            $table->string('password', 100)->nullable();
            $table->string('food_safety_license', 100)->nullable();
            $table->string('logo', 100)->nullable();
             $table->date('expiry_date')->nullable();
            $table->string('status', 10)->nullable();
            $table->string('block_reason', 500)->nullable();
            $table->string('profile_image', 100)->nullable();
            $table->string('is_available', 10)->nullable();
            $table->time('available_from')->nullable();
            $table->time('available_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
