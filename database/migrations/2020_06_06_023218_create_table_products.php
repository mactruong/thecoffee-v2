<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('slug',50);
            $table->string('promo',50)->nullable();
            $table->string('review',255)->nullable();
            $table->string('image',255);
            $table->decimal('price',10,0);
            $table->integer('cat_id')->length(10)->unsigned();    
            $table->foreign('cat_id')->references('id')->on('category')->onDelete('CASCADE');
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
