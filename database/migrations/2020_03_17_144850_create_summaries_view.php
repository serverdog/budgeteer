<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummariesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW summaries AS
        SELECT
            account_categories.id,
            account_categories.name,
            balances.user_id,
            ifnull(sum(amount), 0) AS total
        FROM
            account_categories
            LEFT JOIN accounttypes ON account_categories.id = account_category_id
            LEFT JOIN accounts ON accounttypes.id = accounttype_id
            LEFT JOIN balances ON account_id = accounts.id
                AND latest = 1
                AND balances.deleted_at IS NULL
            where balances.user_id is not null
            GROUP BY
                account_categories.id,
                account_categories.name,
                balances.user_id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW summaries");
    }
}
