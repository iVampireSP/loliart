<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToWingsAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wings_allocations', function (Blueprint $table) {
            $table->string('status')->index()->default('pending')->after('port');
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
            $table->dropIndex('wings_allocations_status_index');
            $table->dropColumn('status');
        });
    }
}
