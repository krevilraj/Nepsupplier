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
            $table->increments('id');
	        $table->string('first_name');
	        $table->string('last_name');
            $table->string('email')->unique();
	        $table->string('phone')->nullable();
            $table->string('password');
            $table->string('provider')->nullable();
	        $table->enum('status', ['GUEST', 'LIVE'])->default('LIVE');
            $table->longText('email_token')->nullable();
            $table->tinyInteger('verified')->default(0);
            $table->tinyInteger('active')->default(0);
            $table->rememberToken();
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
