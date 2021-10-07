<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Statuses
            $table->string('status', 55)->default('Processing'); // Processing, Delivered, Returned
            $table->string('payment_status', 55)->default('Pending'); // Pending, Due, Partial, Paid

            // Customer information
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->bigInteger('order_number')->nullable();
            $table->string('street')->nullable();
            $table->string('apartment')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            // Shipping
            $table->double('shipping_charge')->default(0);
            $table->double('shipping_weight')->default(0);
            $table->string('shipping_length')->nullable(); // Height, Width, Length
            $table->string('shipping_invoice')->nullable();

            // Charges
            $table->double('product_total')->default(0);
            $table->double('tax')->default(0); // Percent amount
            $table->double('tax_amount')->default(0); // Calculated amount
            $table->double('other_cost')->default(0);
            $table->double('discount')->default(0); // Percent amount
            $table->double('discount_amount')->default(0); // Calculated amount

            // Payment
            $table->string('payment_method', 55)->nullable();
            $table->string('payment_transaction_id')->nullable();

            // Notes
            $table->text('note')->nullable();
            $table->text('staff_note')->nullable();

            $table->string('reference_no')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
