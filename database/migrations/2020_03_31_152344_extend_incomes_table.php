<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtendIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('period')->after('dayofmonth');
            $table->decimal('weekly')->nullable();
            $table->decimal('fortnightly')->nullable();
            $table->decimal('monthly')->nullable();
            $table->decimal('yearly')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('house_size')->nullable()->after('country_id');
            $table->unsignedBigInteger('dwelling_id')->nullable()->after('house_size');
            $table->foreign('dwelling_id')->references('id')->on('dwellings');
        });
    }
}
