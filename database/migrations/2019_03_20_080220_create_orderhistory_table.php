<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderhistory', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->enum('status', ['PENDING', 'PAID', 'SHIPPED', 'RECEIVED']);
            $table->timestamps();

            $table->foreign('order_id')
                ->references('id')
                ->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orderhistory');
    }
}
