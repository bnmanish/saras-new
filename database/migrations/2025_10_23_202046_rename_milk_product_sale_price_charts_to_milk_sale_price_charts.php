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
        Schema::rename('milk_product_sale_price_charts', 'milk_sale_price_charts');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('milk_sale_price_charts', 'milk_product_sale_price_charts');
    }
};
