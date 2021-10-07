<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupons', function (Blueprint $table) {
            $table->id();
            $table->string('cupon_name');
            $table->string('status')->default('active');
            $table->text('cupon_des');
            $table->string('discount_type');
            $table->string('free_shiping')->nullable();
            $table->string('individual_use_only')->nullable();
            $table->string('exclude_sale_item')->nullable();
            $table->integer('discount_amount');
            $table->date('expiry_date')->nullable();
            $table->integer('min_amount')->nullable();
            $table->integer('max_amount')->nullable();
            $table->integer('cupon_usage_limit')->nullable();
            $table->integer('cupon_usage_item_limit')->nullable();
            $table->integer('usage_limit_per_user')->nullable();
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
        Schema::dropIfExists('cupons');
    }
}
