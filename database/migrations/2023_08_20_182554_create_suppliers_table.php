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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('phone', 15)->nullable();
            $table->string('contact_person_name', 50)->nullable();
            $table->string('contact_person_phone', 15)->nullable();
            $table->unsignedDecimal('opening_balance', 8, 2);
            $table->string('address', 200)->nullable();
            $table->enum('status', ['t', 'f']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
