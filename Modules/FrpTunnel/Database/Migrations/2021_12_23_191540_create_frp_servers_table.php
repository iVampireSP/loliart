<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrpServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frp_servers', function (Blueprint $table) {
            $table->id();

            $table->string('name')->index();

            $table->string('server_address')->index();

            $table->string('display_address')->index()->nullable();

            $table->string('token')->nullable()->index();

            $table->boolean('allow_http')->index()->default(1);
            $table->boolean('allow_https')->index()->default(1);
            $table->boolean('allow_tcp')->index()->default(1);
            $table->boolean('allow_udp')->index()->default(1);
            $table->boolean('allow_stcp')->index()->default(1);

            $table->unsignedSmallInteger('minimum_port')->default(10000)->index();
            $table->unsignedSmallInteger('maximum_port')->default(60000)->index();

            $table->unsignedInteger('maximum_tunnels')->default(100)->index();

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
        Schema::dropIfExists('frp_servers');
    }
}
