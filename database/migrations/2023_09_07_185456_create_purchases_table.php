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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('supplier_id');
            $table->string('supplier_invoice_no')->nullable();
            $table->string('grn_no')->nullable();
            $table->string('grn_attachment')->nullable();
            $table->date('expected_delivery_date');
            $table->date('delivery_date')->nullable();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('approved_by')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->string('status',20);
            $table->enum('is_paid',['t','f'])->default('f');
            $table->unsignedDecimal('advance_tax',10,2)->nullable();
            $table->string('receipt_no',150)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
