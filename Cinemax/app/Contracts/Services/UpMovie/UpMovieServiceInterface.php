<?php

namespace App\Contracts\Services\UpMovie;

use App\Models\UpcomingMovie;

interface UpMovieServiceInterface
{

    /**
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request);
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param UpcomingMovie $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function update($request, $id);
    /**
     * delete Update Movie
     * @param UpcomingMovie $id
     * @return void
     */
    public function deleteMovie($id);
}
