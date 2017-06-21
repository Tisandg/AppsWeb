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
            $table->string('name',150);
            $table->string('lastname',150);
            $table->string('docid',20)->unique();
            $table->string('username',20)->unique();
            $table->string('password',80);
            $table->char('pin',4);
            $table->string('email',180)->unique();
            $table->text('photo')->nullable();
            $table->string('profile',15)->nullable();
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
