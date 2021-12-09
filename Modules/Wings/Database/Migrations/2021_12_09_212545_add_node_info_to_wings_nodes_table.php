<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNodeInfoToWingsNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wings_nodes', function (Blueprint $table) {
            $table->string('version')->index()->nullable();
            $table->string('kernel_version')->index()->nullable();
            $table->string('architecture')->index()->nullable();
            $table->string('os')->index()->nullable();
            $table->unsignedSmallInteger('cpu_count')->index()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wings_nodes', function (Blueprint $table) {
        });
    }
}