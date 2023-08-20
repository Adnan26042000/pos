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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('size_id')->nullable();
            $table->integer('pieces_in_packing')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('manufacture_id')->nullable();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->unsignedInteger('rack_id')->nullable();
            $table->decimal('supply_price',8,2)->nullable();
            $table->decimal('retail_price',8,2)->nullable();
            $table->enum('discountable',['t','f'])->default('f');
            $table->enum('status',['t','f'])->default('t');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
