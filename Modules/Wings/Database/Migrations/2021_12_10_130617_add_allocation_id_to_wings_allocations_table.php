<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAllocationIdToWingsAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wings_allocations', function (Blueprint $table) {
            $table->unsignedBigInteger('allocation_id')->index()->nullable()->after('server_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wings_allocations', function (Blueprint $table) {
        });
    }
}
