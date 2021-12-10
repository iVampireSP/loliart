<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWingsAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wings_allocations', function (Blueprint $table) {
            $table->id();

            $table->string('ip')->index();
            $table->string('alias')->index()->nullable();
            $table->smallInteger('port')->index();

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
        Schema::dropIfExists('wings_allocations');
    }
}
