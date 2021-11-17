<?php

namespace App\Contracts\Dao\UpMovie;



interface UpMovieDaoInterface{
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


