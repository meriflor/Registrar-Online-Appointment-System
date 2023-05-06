<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_purpose');
            $table->string('acad_year')->nullable();
            $table->string('appointment_date');
            $table->string('payment_method');
            $table->string('proof_of_payment')->nullable();

            $table->boolean('a_transfer');
            $table->string('a_transfer_school')->nullable();
            $table->boolean('b_transfer');
            $table->string('b_transfer_school')->nullable();

            $table->string('status');
            
            $table->string('booking_number')->unique()->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('form_id');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');

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
        Schema::dropIfExists('appointments');
    }
}
