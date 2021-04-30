<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->float('regular_price')->nullable();
            $table->float('sale_price')->nullable();
            $table->float('sku')->nullable();
            $table->float('shipping_weight')->nullable();
            $table->float('shipping_height')->nullable();
            $table->float('shipping_lenght')->nullable();
            $table->float('rack_number')->nullable();
            $table->string('unit')->nullable();
            $table->float('unit_amount')->nullable();
            $table->string('product_excerpt')->nullable();
            $table->bigInteger('stock')->default(0);
            $table->string('variation_img')->nullable();
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
        Schema::dropIfExists('product_data');
    }
}
