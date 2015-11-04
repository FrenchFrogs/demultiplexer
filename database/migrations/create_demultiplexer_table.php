<?php

use FrenchFrogs\Laravel\Database\Schema\Blueprint;
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
        $this->down();

        Schema::create('demultiplexer', function(Blueprint $table){

            $table->binaryUuid('demultiplexer_id')->primary();
            $table->text('params');
            $table->string('token',30)->unique();
            $table->boolean('is_active')->default(1);

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
        Schema::dropIfExists('demultiplexer');
    }
}
