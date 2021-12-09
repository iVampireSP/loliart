<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWingsNestEggsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wings_nest_eggs', function (Blueprint $table) {
            $table->id();

            $table->string('name')->index();
            $table->text('description');
            $table->string('author')->index();
            $table->string('docker_image')->index();
            $table->json('docker_images')->nullable();

            $table->text('startup');
            $table->json('environment')->nullable();

            $table->unsignedInteger('nest_id')->index()->nullable();

            $table->unsignedInteger('egg_id')->index();
            $table->boolean('can_use')->default(true)->index();
            $table->boolean('found')->default(true)->index();

            $table->unsignedInteger('servers')->index()->default(0);

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
        Schema::dropIfExists('wings_nest_eggs');
    }
}