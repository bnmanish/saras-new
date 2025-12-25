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
        Schema::create('dealership_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('business_name');
            $table->text('business_address');
            $table->string('city');
            $table->string('state');
            $table->string('pin_code');
            $table->enum('type_of_business', ['retailer', 'wholesaler', 'distributor']);
            $table->string('approx_daily_requirement');
            $table->text('additional_notes')->nullable();
            $table->boolean('agree_terms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dealership_enquiries');
    }
};
