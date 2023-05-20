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
            $table->text('app_purpose');
            $table->string('acad_year')->nullable();
            $table->string('appointment_date');
            $table->string('payment_method');
            $table->string('proof_of_payment')->nullable();
            // review update reference number is for the payment=== not the OR number
            $table->string('reference_number')->nullable();
            $table->string('payment_approval')->nullable();
            $table->string('date_approved')->nullable();

            $table->boolean('a_transfer');
            $table->string('a_transfer_school')->nullable();
            $table->boolean('b_transfer');
            $table->string('b_transfer_school')->nullable();

            $table->string('status');
            $table->integer('num_copies');
            $table->text('remarks')->nullable();

            $table->string('payment_status');
            $table->boolean('app_moved')->default(0);
            $table->date('org_app_date')->nullable();
            
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
