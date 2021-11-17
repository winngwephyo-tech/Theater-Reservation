<?php

namespace App\Contracts\Services\UpMovie;



interface UpMovieServiceInterface{
     /**
     * To get UpMovies
     * @return $UpMovies
     */
    public function getUpMovies();
    /**
     * Store UpMovie
     * User Request
     */
    public function store($request);
    /**
     * Update UpMovie
     */
    public function update($request, $upMovie);
}


