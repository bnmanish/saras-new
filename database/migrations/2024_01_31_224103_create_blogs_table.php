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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('banner')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('trending',['0','1'])->nullable()->default('1')->comment('0=No,1=Yes');
            $table->enum('latest',['0','1'])->nullable()->default('1')->comment('0=No,1=Yes');
            $table->enum('featured',['0','1'])->nullable()->default('1')->comment('0=No,1=Yes');
            $table->enum('popular',['0','1'])->nullable()->default('1')->comment('0=No,1=Yes');
            $table->enum('other',['0','1'])->nullable()->default('1')->comment('0=No,1=Yes');
            $table->enum('status',['0','1'])->nullable()->default('1')->comment('0=diabled,1=enabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
