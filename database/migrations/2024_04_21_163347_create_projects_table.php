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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('types');
            $table->string('title')->nullable()->unique();
            $table->string('url')->nullable()->unique();
            $table->string('price')->nullable();
            $table->string('sequence')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('project_details')->nullable();
            $table->longText('description')->nullable();
            $table->enum('project_for',['sale','rent','lease'])->nullable()->default('sale');
            $table->enum('is_rera_approved',['0','1'])->default('0')->comment('0=no,1=yes');
            $table->string('video')->nullable();
            $table->longText('map')->nullable();
            $table->string('address')->nullable();
            $table->string('cover_image')->nullable();
            $table->enum('section',['featured','luxury','popular'])->nullable()->default('featured');
            $table->enum('status',['0','1'])->nullable()->default('1')->comment('0=disable,1=enable');
            $table->enum('is_deleted',['0','1'])->nullable()->default('0')->comment('0=yes,1=no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
