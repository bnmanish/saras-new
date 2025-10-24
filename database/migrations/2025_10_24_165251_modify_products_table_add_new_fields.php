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
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('title', 'name');
            $table->integer('price')->nullable();
            $table->string('pack_size')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->json('related_products')->nullable();
            $table->dropColumn('image'); // since we'll use product_images table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('name', 'title');
            $table->dropColumn(['price', 'pack_size', 'short_description', 'long_description', 'related_products']);
            $table->string('image');
        });
    }
};
