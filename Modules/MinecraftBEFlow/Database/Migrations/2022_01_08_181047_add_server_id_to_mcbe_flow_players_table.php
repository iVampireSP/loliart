<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServerIdToMcbeFlowPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mcbe_flow_players', function (Blueprint $table) {
            $table->unsignedBigInteger('server_id')->index();
            $table->foreign('server_id')->references('id')->on('mcbe_flow_servers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mcbe_flow_players', function (Blueprint $table) {

        });
    }
}
