<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->integer('savedcard_id');
            $table->float('amount');
            $table->enum('status',
                [
                    'PENDING',
                    'SUCCESS',
                    'REFUNDED',
                    'CHARGEBACK',
                    'CHARGEBACK-REVERSED',
                    'DECLINED'
                ]
            );
            $table->string('transaction_reference', 500);
            $table->unsignedInteger('transaction_sequence');
            $table->timestamps();

            //$table->foreign('savedcard_id')->references('id')->on('savedcards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }
}
