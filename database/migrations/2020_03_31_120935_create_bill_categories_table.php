<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('bills', function (Blueprint $table) {
            $table->unsignedBigInteger('bill_category_id')->nullable()->after('user_id');
            $table->foreign('bill_category_id')->references('id')->on('bill_categories');
        });


        Schema::table('bill_items', function (Blueprint $table) {
            $table->unsignedBigInteger('bill_category_id')->nullable()->after('name');
            $table->foreign('bill_category_id')->references('id')->on('bill_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('bill_categories');
        
        Schema::table('bills', function (Blueprint $table) {
            $table->dropColumn('bill_category_id');
        });

        Schema::table('bill_items', function (Blueprint $table) {
            $table->dropColumn('bill_category_id');
        });
    }
}
