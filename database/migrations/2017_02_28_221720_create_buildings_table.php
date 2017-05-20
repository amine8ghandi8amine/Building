<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');

            
            $table->text('img')->nullable();
            $table->string('name');
            $table->integer('price');
            $table->tinyInteger('rent');
            $table->integer('square');
            $table->tinyInteger('type');
            $table->integer('roomNumber')->nullable();
            $table->integer('codePostalMaroc');
            $table->bigInteger('lang')->nullable();
            $table->bigInteger('lat')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->string('smallDisc', 160)->nullable();
            $table->text('largDisc')->nullable();
            $table->text('tags')->nullable();
            

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
        //
        Schema::dropIfExists('buildings');
    }
}
