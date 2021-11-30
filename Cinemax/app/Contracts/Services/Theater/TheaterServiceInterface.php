<?php

namespace App\Contracts\Services\Theater;

use Illuminate\Http\Request;

/**
 * Interface for theater service
 */
interface TheaterServiceInterface
{
    /**
     * To get all theaters
     * @return $theaters
     */
    public function getTheaters();
    /**
     * To add theaters
     * @param $request request with inputs
     * @return $theater_id
     */
    public function addTheaters($request);
    /**
     * To delete theater
     * @param $theater_id
     */
    public function deleteTheater($theater_id);

}
