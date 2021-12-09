<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWingsNestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wings_nests', function (Blueprint $table) {
            $table->id();

            $table->string('name')->index();
            $table->string('description')->index()->nullable();
            $table->string('author')->index();

            $table->unsignedInteger('nest_id')->index();
            $table->boolean('display')->default(true)->index();
            $table->boolean('found')->default(true)->index();

            $table->unsignedInteger('eggs')->index()->default(0);
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
        Schema::dropIfExists('wings_nests');
    }
}