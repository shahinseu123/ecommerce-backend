<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->text('slider_text_1')->nullable();
            $table->text('slider_text_2')->nullable();
            $table->text('slider_text_3')->nullable();
            $table->text('btn_text_1')->nullable();
            $table->text('btn_url_1')->nullable();
            $table->text('btn_text_2')->nullable();
            $table->text('btn_url_2')->nullable();
            $table->text('slider_description')->nullable();
            $table->string('slider_image')->nullable();
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
        Schema::dropIfExists('sliders');
    }
}
