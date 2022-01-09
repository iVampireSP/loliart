<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupIdToMcbeFlowServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mcbe_flow_servers', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id')->index()->nullable();
            $table->foreign('group_id')->references('id')->on('mcbe_flow_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mcbe_flow_servers', function (Blueprint $table) {
        });
    }
}
