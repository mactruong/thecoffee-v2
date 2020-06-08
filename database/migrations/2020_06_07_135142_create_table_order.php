<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('sum',10);
            $table->integer('id_cus')->length(10)->unsigned();
            $table->foreign('id_cus')->references('id')->on('user')->onDelete('CASCADE');
            $table->tinyInteger('type');
            $table->string('note')->nullable();
            $table->string('receiver_name',50)->nullable();
            $table->string('receiver_phone',15)->nullable();
            $table->string('receiver_address',50)->nullable();
            $table->integer('admin_id')->length(10)->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('CASCADE');
            $table->string('status',15)->nullable();
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
        Schema::dropIfExists('order');
    }
}
