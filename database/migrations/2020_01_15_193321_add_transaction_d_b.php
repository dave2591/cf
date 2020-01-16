<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddTransactionDB extends Migration
{
    public function up()
    {
        DB::statement("
                create table transactions
        (
            id serial
                constraint transactions_pk
                    primary key,
            user_id int,
            currency_from varchar(3),
            currency_to varchar(3),
            amount_sell numeric(12,2),
            amount_buy numeric(12,2),
            rate numeric(10,4),
            time_placed timestamp,
            originating_country varchar(4),
            updated_at timestamp,
	        created_at timestamp
        );
        ");

        DB::statement("
            create index transactions_id_index
                on transactions (id);
            ");
    }

    public function down()
    {

    }
}
