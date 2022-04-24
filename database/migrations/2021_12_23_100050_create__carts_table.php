<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Carts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('product_id');
            $table->boolean('ordered');
            $table->foreign('account_id')
                ->references('id')
                ->on('account')
                ->onDelete('cascade');
            $table->foreign('product_id')
                ->references('id')
                ->on('Products')
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
        Schema::dropIfExists('Carts');
    }
}
