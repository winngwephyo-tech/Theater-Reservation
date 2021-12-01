<?php

namespace App\Contracts\Dao\Theater;

use App\Models\Theater;

/**
 * Interface for Data Accessing Object of Theater
 */
interface TheaterDaoInterface
{
    /**
     * To add theater
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTheaters($request);
    /**
     * To delete theater
     * @param Theater $theater_id
     * @return \Illuminate\Http\Response
     */
    public function deleteTheater($theater_id);
}
