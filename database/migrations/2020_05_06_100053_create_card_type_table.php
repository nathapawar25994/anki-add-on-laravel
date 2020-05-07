<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('rem_count')->default(0);
            $table->integer('total_count')->default(0);
            $table->unsignedBigInteger('deck_id');
            $table->foreign('deck_id')
                ->references('id')
                ->on('decks')
                ->onDelete('cascade');
            $table->integer('status')->nullable();  
            $table->timestamps();
        });

        DB::table('card_type')->insert([
            ['name' => 'New Word Card', 'rem_count' => 0,'total_count' => 0,'deck_id' => 1,'status' => 1],
            ['name' => 'Picture-word Card', 'rem_count' => 0,'total_count' => 0,'deck_id' => 1,'status' => 1],
            ['name' => 'Word (Dictionary Form)', 'rem_count' => 0,'total_count' => 0,'deck_id' => 1,'status' => 1],
            ['name' => ' Word-sentence Card', 'rem_count' => 0,'total_count' => 0,'deck_id' => 1,'status' => 1],
           
        ]);
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_type');
    }
}
