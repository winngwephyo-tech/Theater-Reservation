<?php

namespace App\Contracts\Dao\UpMovie;
interface UpMovieDaoInterface{
      /**
     * Store UpMovie
     * User Request
     */
    public function store($request);
    /**
     * Update UpMovie
     */
    public function update($request, $id);
    /**
     * delete Update Movie
     */
    public function deleteMovie($id);
}