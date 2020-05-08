<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertValuesCardTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('card_type')->insert([
            ['name' => 'Listening/Reading Card', 'rem_count' => 0,'total_count' => 0,'deck_id' => 20,'status' => 1],
            ['name' => 'Extra-card(Ex-Grammer Cards etc.)', 'rem_count' => 0,'total_count' => 0,'deck_id' => 20,'status' => 1],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
