<?php

namespace App\Services\UpMovie;

use App\Contracts\Dao\UpMovie\UpMovieDaoInterface;
use App\Contracts\Services\UpMovie\UpMovieServiceInterface;


class UpMovieService implements UpMovieServiceInterface
{
    /**
     * UpMovieDao
     */
    private $upmovieDao;
    /**
     * Class Constructor
     * @param UpMovieDaoInterface $upmovieDao
     * @return void
     */
    public function __construct(UpMovieDaoInterface $upmovieDao)
    {
        $this->upmovieDao = $upmovieDao;
    }
    /**
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        return $this->upmovieDao->store($request);
    }
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param UpcomingMovie $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function update($request, $id)
    {
        return $this->upmovieDao->update($request, $id);
    }
    /**
     * delete Update Movie
     * @param UpcomingMovie $id
     * @return void
     */
    public function deleteMovie($id)
    {
        return $this->upmovieDao->deleteMovie($id);
    }
}
