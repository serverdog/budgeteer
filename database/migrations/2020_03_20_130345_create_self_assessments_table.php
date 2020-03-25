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

            $table->decimal('total_dividends')->nullable()->default(0);
            $table->decimal('dividend_amount')->nullable()->default(0);
            $table->decimal('share')->nullable()->default(100);
            $table->decimal('salary')->nullable()->default(0);
            $table->decimal('savings')->nullable()->default(0);
            $table->decimal('other')->nullable()->default(0);
            $table->decimal('july_payment')->nullable()->default(0);
            $table->decimal('tax')->nullable()->default(0);
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
