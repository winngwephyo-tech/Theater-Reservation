<?php

namespace App\Services\Movie;

use App\Contracts\Dao\Movie\MovieDaoInterface;
use App\Contracts\Services\Movie\MovieServiceInterface;
use App\Dao\Movie\MovieDao;


class MovieService implements MovieServiceInterface
{
    /**
     * Movie dao
     */
    private $movieDao;
    /**
     * Class Constructor
     * @param MovieDao
     * @return
     */
    public function __construct(MovieDaoInterface $movieDao)
    {
        $this->movieDao = $movieDao;
    }

    /**
     * To get Movies
     * @return $Movies
     */
    public function getMovies()
    {
       $this->movieDao->getMovies();
    }
     /**
     * Count theater id
     * for create movie
     */
    public function create(){
        return $this->movieDao->create(); 
    }

    /**
     * @param request
     *Store Movie Data
     */
    public function store($request){
         $this->movieDao->store($request);
    }
    /**
     * @param request and $id
     *Update Movie Data
     */
    public function update($request, $id){
            $input = [
            'theater_id' => $request->theater_id, 'genre' => $request->genre, 'title' => $request->title,
            'details' => $request->details, 'rating' => $request->rating, 'trailer' => $request->trailer,
            'duration' => $request->duration, 'cast' => $request->cast
        ];
        if ($poster = $request->file('poster')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $poster->getClientOriginalExtension();
            $poster->move($destinationPath, $profileImage);
            $input['poster'] = "$profileImage";
        }
        $this->movieDao->updateMovie($input,$id);
        $this->movieDao->updateShowTime($request,$id);
        
    }
    /**
     *Count No of Theater
     */

    public function count_theater()
    {
        $theater = $this->movieDao->count_theater();
        return $theater;
    }
    /**
     *Select Data from Movies Table
     */
    public function get_showingMovieData()
    {
         return $this->movieDao->get_showingMovieData();
    }
    /**
     *Count UpComing Movie List
     */
    public function count_upcomingMovie()
    {
        return $this->movieDao->count_upcomingMovie();
    }
    /**
     *Select Data from UpComing Movies Table
     */
    public function get_upcomingMovieData()
    {
         return $this->movieDao->get_upcomingMovieData();
    }
}


