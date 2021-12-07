<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWingsNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wings_nodes', function (Blueprint $table) {
            $table->id();

            $table->string('name')->index();
            $table->string('display_name')->index();

            $table->string('fqdn')->index();

            $table->boolean('behind_proxy')->index()->default(false);
            $table->boolean('maintenance_mode')->index()->default(false);

            // $table->unsignedBigInteger('location_id')->index();

            $table->boolean('visibility')->index()->default(false);

            $table->unsignedInteger('upload_size')->index()->default(100);
            $table->unsignedInteger('memory')->index();
            $table->integer('memory_overallocate')->default(0);

            $table->unsignedInteger('disk')->index();
            $table->integer('disk_overallocate')->default(0);

            $table->string('daemon_base')->index()->default(
                '/var/lib/pterodactyl/volumes'
            );

            $table->unsignedSmallInteger('daemonListen')->index()->default(8080);
            $table->unsignedSmallInteger('daemonSFTP')->index()->default(2022);


            $table->unsignedBigInteger('location_id')->index();
            $table->foreign('location_id')->references('id')->on('wings_locations');

            $table->unsignedBigInteger('node_id')->index();

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
        Schema::dropIfExists('wings_nodes');
    }
}
