<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->Increments('id');
            $table->bigInteger('contract_id')->unsigned();
            $table->string('fantasy_name');
            $table->string('cpf');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('clients', function (Blueprint $table) {
            
            $table->foreign('contract_id')->references('id')->on('contracts'); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
