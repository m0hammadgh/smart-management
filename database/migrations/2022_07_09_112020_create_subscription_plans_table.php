<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('duration')->default(0);
            $table->string('charge_amount')->nullable();
            $table->text('withdraw_rial')->nullable();
            $table->text('withdraw_crypto')->nullable();
            $table->text('description')->nullable();
            $table->boolean('all_features')->default(true);
            $table->string('user_profit')->nullable();
            $table->string('admin_profit')->nullable();
            $table->string('price')->nullable();
            $table->string('title')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_plans');
    }
}
