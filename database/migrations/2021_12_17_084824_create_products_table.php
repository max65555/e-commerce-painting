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
        Schema::create('categories',function(Blueprint $table){
            $table->increments('id');
            $table->string('Categoriesname');
            $table->timestamps();

        });
        Schema::create('reviews',function(Blueprint $table){
            $table->increments('id');
            $table->string('ReviewsName');
            $table->unsignedInteger('account_id');
            $table->string('comment');
            $table->integer('star');
            $table->foreign('account_id')->references('id')->on('account')->onDelete('cascade');
            $table->timestamps();

        });
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ProductsName');
            $table->string('imagePath');
            $table->string('Price');
            $table->string('description');
            $table->unsignedInteger('categories_id');
            $table->unsignedInteger('reviews_id');
            $table->timestamps();
            $table->foreign('categories_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('reviews_id')
                ->references('id')
                ->on('reviews')
                ->onDelete('cascade');
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
        Schema::dropIfExists('categories');
        Schema::dropIfExists('reviews');
    }
}
