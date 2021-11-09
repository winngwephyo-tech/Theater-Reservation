<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('movie_id');
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->integer('showtime_id');
            $table->foreign('showtime_id')->references('id')->on('showtimes');
            $table->integer('seat_id');
            $table->foreign('seat_id')->references('display_id')->on('seats');
            $table->boolean('is_booked');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
