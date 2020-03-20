<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelfAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('self_assessments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('year');
            $table->string('name');

            $table->decimal('total_dividends')->default(0);
            $table->decimal('dividend_amount')->default(0);
            $table->decimal('share')->default(100);
            $table->decimal('salary')->default(0);
            $table->decimal('savings')->default(0);
            $table->decimal('other')->default(0);
            $table->decimal('july_payment')->default(0);
            $table->decimal('tax')->default(0);
            $table->boolean('active')->default(true);

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
        Schema::dropIfExists('self_assessments');
    }
}
