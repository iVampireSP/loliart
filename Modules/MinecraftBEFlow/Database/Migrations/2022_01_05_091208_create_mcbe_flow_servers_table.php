<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcbeFlowServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcbe_flow_servers', function (Blueprint $table) {
            $table->id();

            $table->string('name')->index();
            $table->string('ip')->index();
            $table->string('port')->index();

            $table->string('start_x')->index();
            $table->string('start_z')->index();

            $table->string('end_x')->index();
            $table->string('end_z')->index();

            $table->unsignedBigInteger('team_id')->index();
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
        Schema::dropIfExists('mcbe_flow_servers');
    }
}
