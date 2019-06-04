<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('ic');
            $table->string('password');
            $table->rememberToken();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('code')->unique();
            $table->text('address')->nullable();
            $table->enum('user_type', array('administrator', 'staff', 'agent', 'vendor', 'passenger'))->default('passenger');
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
