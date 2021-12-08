<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePanelAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panel_accounts', function (Blueprint $table) {
            $table->id();

            $table->string('email')->index()->unique();
            $table->string('username')->index()->unique();
            $table->string('first_name')->index();
            $table->string('last_name')->index();

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
        Schema::dropIfExists('panel_accounts');
    }
}