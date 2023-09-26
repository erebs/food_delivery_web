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
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->nullable();
            $table->string('staff_type', 10)->nullable();
            $table->string('franchise_id', 5)->nullable();
            $table->string('shop_id', 5)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->rememberToken();
            $table->string('mail_id', 100)->nullable();
            $table->string('address', 1000)->nullable();
            $table->string('password', 100)->nullable();
            $table->string('license', 100)->nullable();
            $table->string('status', 10)->nullable();
            $table->string('block_reason', 500)->nullable();
            $table->string('profile_image', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
