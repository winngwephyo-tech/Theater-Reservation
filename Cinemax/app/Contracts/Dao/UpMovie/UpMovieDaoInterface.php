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
    public function update($request, $upMovie);
}