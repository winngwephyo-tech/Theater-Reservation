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
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('theater_id');
            $table->foreign('theater_id')->references('id')->on('theaters');
            $table->string('genre');
            $table->string('title');
            $table->binary('poster');
            $table->string('details');
            $table->float('rating');
            $table->string('trailer');
            $table->integer('duration');
            $table->string('cast');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
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
