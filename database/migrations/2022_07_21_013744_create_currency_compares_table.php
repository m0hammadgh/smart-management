<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyComparesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_compares', function (Blueprint $table) {
            $table->id();
            $table->text('currency_id')->nullable();
            $table->text('low_price')->nullable();
            $table->text('top_price')->nullable();
            $table->text('top_exchange_id')->nullable();
            $table->text('low_exchange_id')->nullable();
            $table->text('profit')->nullable();
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
        Schema::dropIfExists('currency_compares');
    }
}
