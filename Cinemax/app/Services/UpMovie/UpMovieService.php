<?php

namespace App\Services\UpMovie;

use App\Contracts\Dao\UpMovie\UpMovieDaoInterface;
use App\Contracts\Services\UpMovie\UpMovieServiceInterface;


class UpMovieService implements UpMovieServiceInterface
{
    /**
     * Movie dao
     */
    private $upmovieDao;
    /**
     * Class Constructor
     * @param MovieDao
     * @return
     */
    public function __construct(UpMovieDaoInterface $upmovieDao)
    {
        $this->upmovieDao = $upmovieDao;
    }
    /**
     * 
     */
    public function store($request){
        $this->upmovieDao->store($request);
    }
    /**
     * Update Movie
     */
    public function update($request, $id){
        $this->upmovieDao->update($request,$id);
    }
     /**
     * delete Update Movie
     */
    public function deleteMovie($id){
        $this->upmovieDao->deleteMovie($id);
    }
}