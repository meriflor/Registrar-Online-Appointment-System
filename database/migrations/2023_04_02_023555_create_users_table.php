<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('middleName')->nullable();
            $table->string('suffix')->nullable();
            $table->string('address');
            $table->string('school_id');
            $table->string('cell_no');
            $table->string('civil_status')->nullable();
            $table->string('email')->unique();
            $table->date('birthdate')->nullable();
            $table->string('status')->nullable();
            $table->string('gender')->nullable();
            $table->string('course')->nullable();
            $table->string('password');
            $table->string('acadYear')->nullable();
            $table->string('gradYear')->nullable();
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
class User extends Authenticatable
{

}
