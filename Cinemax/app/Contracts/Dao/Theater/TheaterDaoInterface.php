<?php

namespace App\Contracts\Dao\Theater;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Theater
 */
interface TheaterDaoInterface
{
    /**
     * To get all theaters
     * @return $theaters
     */
    public function getTheaters();
    /**
     * To add theater
     * @param $request request inputs
     * @return $theater_id
     */
    public function addTheaters($request);
    /**
     * To delete theater
     * @param $theater_id
     */
    public function deleteTheater($theater_id);
}
