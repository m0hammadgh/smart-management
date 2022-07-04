<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')->nullable();
            $table->text('last_name')->nullable();
            $table->text('email')->nullable();
            $table->text('password')->nullable();
            $table->text('user_name')->nullable();
            $table->text('mobile_number')->nullable();
            $table->text('picture')->nullable();
            $table->text('national_card')->nullable();
            $table->text('invite_code')->nullable();
            $table->text('random_register')->nullable();
            $table->text('sms_code')->nullable();
            $table->dateTime('last_sms_code')->nullable();
            $table->boolean('mobile_verified')->default(false);
            $table->boolean('email_verified')->default(false);
            $table->enum('status',['active','mobile_verification','document_verification','fill_information','block','new'])->default('new');
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
        Schema::dropIfExists('users');
    }
}
