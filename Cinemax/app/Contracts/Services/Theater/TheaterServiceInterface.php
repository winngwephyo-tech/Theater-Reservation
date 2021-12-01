<?php

namespace App\Contracts\Services\Theater;

use App\Models\Theater;
use Illuminate\Http\Request;

/**
 * Interface for theater service
 */
interface TheaterServiceInterface
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
