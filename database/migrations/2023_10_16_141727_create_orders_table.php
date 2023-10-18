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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('transaction_id');
            $table->string('customer_name');
            $table->string('customer_code');
            $table->decimal('transaction_amount', 10, 2);
            $table->decimal('transaction_discount', 10, 2);
            $table->string('transaction_additional_field')->nullable();
            $table->string('transaction_payment_type');
            $table->string('transaction_state');
            $table->string('transaction_code');
            $table->integer('transaction_order');
            $table->uuid('location_id');
            $table->integer('organization_id');
            $table->string('transaction_payment_type_name');
            $table->decimal('transaction_cash_amount', 10, 2);
            $table->decimal('transaction_cash_change', 10, 2);
            $table->uuid('connote_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
