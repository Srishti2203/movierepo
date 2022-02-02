<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    protected $connection = 'mongodb';
    
    public function up()
    {
        Schema::connection('mongodb')->create('movies', function (Blueprint $table) {
            $table->integer('user_id');
            $table->string('movieName');
            $table->integer('link_radio');
            $table->string('Released');
            $table->string('Runtime');
            $table->string('Genre');
            $table->string('Actors');
             $table->string('Director');
            $table->string('Poster')->null();
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
        Schema::dropIfExists('movies');
    }
}
