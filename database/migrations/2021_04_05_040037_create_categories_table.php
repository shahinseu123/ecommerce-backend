<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_title')->max(255);
            $table->text('short_description')->nullable();
            $table->text('category_description')->nullable();
            $table->string('category_image')->nullable();
            $table->string('status')->default('active');
            $table->unsignedBigInteger('parent_category')->nullable();
            $table->foreign('parent_category')->references('id')->on('categories')->onDelete('cascade');
            $table->string('meta_title')->max(255)->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_tags')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
