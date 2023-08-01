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
        Schema::create('sneakers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('brand_id');

            $table->string('image');
            $table->string('name');

            $table->string('price');
            $table->string('promotion_price')->nullable();
            $table->boolean('in_promotion')->default(false);

            $table->string('color');

            //array
            $table->string('sizes');

            //images

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sneakers');
    }
};
