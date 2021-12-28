<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrpTunnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frp_tunnels', function (Blueprint $table) {
            $table->id();

            $table->string('name')->index();

            $table->char('protocol', 5)->index()->default("tcp");

            $table->string('custom_domain')->nullable()->index();

            $table->string('local_address')->index();

            $table->unsignedSmallInteger('remote_port')->index()->nullable();

            $table->uuid('client_token')->index()->unique();

            $table->string('sk')->index()->nullable();

            $table->boolean('status')->default(false)->index();

            $table->unsignedBigInteger('server_id')->index();
            $table->foreign('server_id')->references('id')->on('frp_servers');

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
        Schema::dropIfExists('frp_tunnels');
    }
}
