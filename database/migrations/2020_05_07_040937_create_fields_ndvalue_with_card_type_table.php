<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsNdvalueWithCardTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields_value_with_card_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('field_id');
            $table->foreign('field_id')
                ->references('id')
                ->on('fields_desc')
                ->onDelete('cascade');
            $table->string('value',1000)->nullable();
            $table->unsignedBigInteger('deck_id');
            $table->foreign('deck_id')
                ->references('id')
                ->on('decks')
                ->onDelete('cascade');
            $table->integer('type')->nullable()->comment('1:Qeustion///2:Answer');
            $table->integer('position')->nullable();
            $table->BigInteger('number_id');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('fields_ndvalue_with_card_type');
    }
}
