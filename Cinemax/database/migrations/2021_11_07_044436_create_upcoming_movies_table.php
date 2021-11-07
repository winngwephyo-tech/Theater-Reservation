<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpcomingMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upcoming_movies', function (Blueprint $table) {
            $table->id();
            $table->date('release_date');
            $table->string('genre');
            $table->string('title');
            $table->binary('poster');
            $table->string('details');
            $table->string('trailer');
            $table->integer('duration');
            $table->string('cast');
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
        Schema::dropIfExists('upcoming_movies');
    }
}
