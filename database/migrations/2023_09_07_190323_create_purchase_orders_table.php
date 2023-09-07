<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('purchase_id');
            $table->unsignedDecimal('product_id');
            $table->unsignedInteger('qty')->comment('qty_in_pieces');
            $table->unsignedDecimal('supply_price', 10, 2)->comment('per_piece_price');
            $table->unsignedDecimal('retail_price', 10, 2)->comment('per_piece_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
