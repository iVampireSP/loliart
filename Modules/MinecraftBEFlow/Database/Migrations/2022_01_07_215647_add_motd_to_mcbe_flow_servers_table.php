<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMotdToMcbeFlowServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mcbe_flow_servers', function (Blueprint $table) {
            $table->string('motd')->default('Edge Flowing');
            $table->string('version')->index();
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
