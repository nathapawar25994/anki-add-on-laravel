<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsShowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards_show', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('deck_id');
            $table->foreign('deck_id')
                ->references('id')
                ->on('decks')
                ->onDelete('cascade');
            $table->string('font_family')->nullable();
            $table->integer('font_size')->nullable();
            $table->string('center')->nullable();
            $table->string('color')->nullable();
            $table->string('background_color')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards_show');
    }
}
