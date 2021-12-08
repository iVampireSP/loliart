<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWingsLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wings_locations', function (Blueprint $table) {
            $table->id();

            $table->string('name')->index();
            $table->string('short')->index();

            $table->unsignedBigInteger('location_id')->index()->nullable();

            $table->unsignedBigInteger('team_id')->index();
            $table->foreign('team_id')->references('id')->on('teams');

            $table->string('status')->index()->default('pending');

            $table->boolean('visibility')->index()->default(false);

            $table->unsignedBigInteger('node_count')->index()->default(0);

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
        Schema::dropIfExists('wings_locations');
    }
}