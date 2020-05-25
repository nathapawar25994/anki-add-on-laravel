<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertCardType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('card_type')->insert([
            ['id' => 9,'name' => 'Pronunciation card', 'rem_count' => 0,'total_count' => 0,'deck_id' => 20,'status' => 1],
            ['id' => 10,'name' => 'Spelling Card', 'rem_count' => 0,'total_count' => 0,'deck_id' => 20,'status' => 1],
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
