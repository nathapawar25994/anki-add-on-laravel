<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InserValuesFieldsDescTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('decks')->insert([
            'id' => 20,'name' => 'Default', 'rem_count' => 0,'total_count' => 0,'status' => 1
           
        ]);

        DB::table('fields_desc')->insert([
            ['name' => 'Sentence', 'type' => NULL,'deck_id' => 20,'status' => 1],
            ['name' => 'Sentence - Word (sentence with a __)','type' => NULL,'deck_id' => 20,'status' => 1],
            ['name' => 'Word (Inflected Form)', 'type' => NULL,'deck_id' => 20,'status' => 1],
            ['name' => 'Word (Dictionary Form)', 'type' => NULL,'deck_id' => 20,'status' => 1],
            ['name' => 'IPA', 'type' => NULL,'deck_id' => 20,'status' => 1],
            ['name' => 'Part of Speech (POS)', 'type' => NULL,'deck_id' => 20,'status' => 1],
            ['name' => 'Definition', 'type' => NULL,'deck_id' => 20,'status' => 1],
            ['name' => 'Image', 'type' => NULL,'deck_id' => 20,'status' => 1],
            ['name' => 'Sound-Word', 'type' => NULL,'deck_id' => 20,'status' => 1],
            ['name' => 'Notes (visible on cards)', 'type' => NULL,'deck_id' => 20,'status' => 1],
            ['name' => 'Notes (not visible on cards)', 'type' => NULL,'deck_id' => 20,'status' => 1],
            ['name' => 'Word-Translation', 'type' => NULL,'deck_id' => 20,'status' => 1],
            ['name' => 'Sentence-Translation', 'type' => NULL,'deck_id' => 20,'status' => 1],
            ['name' => 'Sound-Sentence', 'type' => NULL,'deck_id' => 20,'status' => 1],

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
