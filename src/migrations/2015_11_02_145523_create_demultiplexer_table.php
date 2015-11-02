<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemultiplexerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('demultiplexer')) {
            Schema::create('demultiplexer', function(Blueprint $table){

                $table->increments('demultiplexer_id');
                $table->text('params');
                $table->string('token',30)->unique();
                $table->boolean('is_active')->default(1);

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demultiplexer');
    }
}
