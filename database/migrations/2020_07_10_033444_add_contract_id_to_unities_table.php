<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContractIdToUnitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unities', function (Blueprint $table) {

            $table->unsignedInteger('contract_id')->after('id');

            $table->foreign('contract_id')->references('id')->on('contracts'); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unities', function (Blueprint $table) {
            $table->dropColumn(['contract_id']);
        });
    }
}
