<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrpTunnelTrafficTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frp_tunnel_traffic', function (Blueprint $table) {
            $table->id();

            $table->date('date')->index();
            $table->unsignedBigInteger('bytes')->nullable()->index();

            $table->unsignedBigInteger('tunnel_id')->index();
            $table->foreign('tunnel_id')->references('id')->on('frp_tunnels');

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
        Schema::dropIfExists('frp_tunnel_traffic');
    }
}
