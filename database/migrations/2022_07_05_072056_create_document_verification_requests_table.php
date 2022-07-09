<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentVerificationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_verification_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->text('file')->nullable();
            $table->enum('type', ['national_card', 'shenasname', 'driving_licence', 'profile_photo'])->default('national_card');

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
        Schema::dropIfExists('document_verification_requests');
    }
}
