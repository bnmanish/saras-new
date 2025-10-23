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
        Schema::create('important_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('landline')->nullable();
            $table->string('mobile_number');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('important_contacts');
    }
};
