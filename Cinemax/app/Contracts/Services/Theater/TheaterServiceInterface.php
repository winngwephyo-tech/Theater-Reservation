<?php

namespace App\Contracts\Services\Theater;

use Illuminate\Http\Request;

/**
 * Interface for theater service
 */
interface TheaterServiceInterface
{
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
