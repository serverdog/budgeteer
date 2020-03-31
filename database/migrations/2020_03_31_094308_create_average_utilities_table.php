<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAverageUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('average_utilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('population')->nullable();
            $table->unsignedBigInteger('dwelling_id')->nullable();
            $table->foreign('dwelling_id')->references('id')->on('dwellings');
            $table->unsignedInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('name');
            $table->integer('average_bill');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('average_utilities');
    }
}
