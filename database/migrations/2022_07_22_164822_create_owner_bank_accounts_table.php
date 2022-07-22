<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnerBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_bank_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('bank')->nullable();
            $table->text('card')->nullable();
            $table->text('account')->nullable();
            $table->text('IBAN')->nullable();
            $table->text('owner_name')->nullable();
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
        Schema::dropIfExists('owner_bank_accounts');
    }
}
