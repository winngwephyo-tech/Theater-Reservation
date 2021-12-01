<?php

namespace App\Contracts\Dao\UpMovie;

use App\Models\UpcomingMovie;

interface UpMovieDaoInterface
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
     * @return \Illuminate\Http\Response
     */
    public function deleteMovie($id);
}
