<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('idorder')->unsigned();
            $table->dateTime('orderdate');
            $table->integer('pinclient');
            $table->integer('pinwaiter');
            $table->integer('pinchef')->nullable();
            $table->dateTime('attendate');
            $table->decimal('payvalue',8,2)->nullable();
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
