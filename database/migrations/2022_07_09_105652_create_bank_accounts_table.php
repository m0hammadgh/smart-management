<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bank_id')->nullable();
            $table->string('user_id')->nullable();
            $table->text('IBAN')->nullable();
            $table->text('number')->nullable();
            $table->text('account_number')->nullable();
            $table->text('note')->nullable();
            $table->enum('type',['card','account'])->default('card');
            $table->enum('status',['review','confirm','reject'])->default('review');
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
        Schema::dropIfExists('bank_accounts');
    }
}
