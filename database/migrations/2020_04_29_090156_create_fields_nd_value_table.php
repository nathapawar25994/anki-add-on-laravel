<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsNdValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields_nd_value', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('field_id');
            $table->foreign('field_id')
                ->references('id')
                ->on('fields_desc')
                ->onDelete('cascade');
            $table->string('value')->nullable();
            $table->unsignedBigInteger('deck_id');
            $table->foreign('deck_id')
                ->references('id')
                ->on('decks')
                ->onDelete('cascade');
            $table->string('status')->nullable();
            $table->BigInteger('number_id');
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
        Schema::dropIfExists('fields_nd_value');
    }
}
