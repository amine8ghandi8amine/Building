<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableForReplyMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('contact_id')->nullable()->unsigned();
            $table->foreign('contact_id')
              ->references('id')
              ->on('contacts')
              ->onDelete('cascade')
              ->nullable();

            $table->string('email')->nullable();

            $table->string('subject');
            $table->text('message');

            $table->tinyInteger('confirmed');
            $table->tinyInteger('deleted');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade')
              ->nullable();


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
        Schema::dropIfExists('replies');
    }
}
