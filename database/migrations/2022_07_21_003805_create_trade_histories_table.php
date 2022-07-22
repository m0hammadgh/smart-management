<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('profit')->nullable();
            $table->string('status')->nullable();
            $table->text('sell_price')->nullable();
            $table->text('buy_price')->nullable();
            $table->text('sell_exchange_id')->nullable();
            $table->text('buy_exchange_id')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('currency_id')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('trade_histories');
    }
}
