<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWingsServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wings_servers', function (Blueprint $table) {
            $table->id();

            $table->string('name')->index();

            $table->unsignedInteger('cpu_limit')->index();
            $table->unsignedInteger('memory')->index();
            $table->unsignedInteger('disk')->index();
            $table->unsignedInteger('databases')->index();
            $table->unsignedInteger('backups')->index();

            $table->unsignedBigInteger('node_id')->index();
            $table->unsignedBigInteger('server_id')->index();
            $table->unsignedBigInteger('allocation_id')->index();
            $table->unsignedBigInteger('egg_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->double('real_pay')->index()->nullable();
            $table->string('status')->index();

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
        Schema::dropIfExists('wings_servers');
    }
}