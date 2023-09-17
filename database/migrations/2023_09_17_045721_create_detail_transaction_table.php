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
        Schema::create('detail_transaction', function (Blueprint $table) {
            $table->id();
            $table->index('product_id');
            $table->index('transaction_id');
            $table->index('payment_method_id');
            $table->index('customer_address_id');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('transaction_id')->references('id')->on('transactions');
            $table->foreignId('payment_method_id')->references('id')->on('payment_method');
            $table->foreignId('customer_address_id')->references('id')->on('customer_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaction');
    }
};
