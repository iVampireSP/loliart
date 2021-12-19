<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('name')->index();
            $table->string('order_id')->index();

            $table->double('value')->index()->default(0.00);
            $table->string('payment')->index()->nullable();
            $table->string('comment')->index()->nullable();
            $table->string('status')->index()->default('pending');

            $table->string('product')->index()->nullable();
            $table->unsignedBigInteger('product_id')->index()->nullable();

            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('team_id')->index()->nullable();
            $table->foreign('team_id')->references('id')->on('teams');

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
        Schema::dropIfExists('orders');
    }
}
