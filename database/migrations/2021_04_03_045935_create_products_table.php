<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1);
            $table->string('title');
            $table->integer('count_sold')->nullable();
            $table->string('type', 55)->default('Simple'); // Simple, Variable
            $table->tinyInteger('featured')->default(0);
            $table->text('short_description')->nullable();
            $table->longText('description');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_tags')->nullable();
            $table->integer('position')->default(1000);
            $table->string('product_image')->nullable();
            $table->string('image_path')->nullable();
            $table->unsignedBigInteger('media_id')->nullable();
            // $table->bigInteger('stock')->default(0);
            $table->bigInteger('stock_alert_quantity')->default(0);
            $table->bigInteger('stock_pre_alert_quantity')->default(0);
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
        Schema::dropIfExists('products');
    }
}
