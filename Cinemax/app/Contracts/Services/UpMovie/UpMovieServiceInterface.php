<?php

namespace App\Contracts\Services\UpMovie;
interface UpMovieServiceInterface{
 
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
