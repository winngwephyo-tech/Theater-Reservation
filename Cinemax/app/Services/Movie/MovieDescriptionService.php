<?php

namespace App\Services\Movie;

use App\Contracts\Dao\Movie\MovieDescriptionDaoInterface;
use App\Contracts\Services\Movie\MovieDescriptionServiceInterface;

class MovieDescriptionService implements MovieDescriptionServiceInterface
{
    /**
     * MovieDescriptionDao
     */
    private $MovieDescriptionDao;
    /**
     * Class Constructor
     * @param MovieDescriptionDaoInterface $MovieDescriptionDaoInterface
     * @return void
     */
    public function __construct(MovieDescriptionDaoInterface $MovieDescriptionDaoInterface)
    {
        $this->MovieDescriptionDao = $MovieDescriptionDaoInterface;
    }
    /**
     * @param Movie $id
     * @return Movies movies
     */
    public function movie_details($id)
    {
        return $this->MovieDescriptionDao->movie_details($id);
    }
    /**
     * get data for theater
     * @return Object Theater
     */
    public function theater_name($id)
    {
        return $this->MovieDescriptionDao->theater_name($id);
    }
    /**
     * @param Showtime $id
     * @return Showtimes showtimes
     */

    public function showtime($id)
    {
        return $this->MovieDescriptionDao->showtime($id);
    }
    /**
     * @param UpcomingMovie $id
     * @return UpcomingMovie upcomingmovie
     */
    public function upmovie($id)
    {
        return $this->MovieDescriptionDao->upmovie($id);
    }

    /**
     * count upcoming movie
     * @return no of upcoming movie list
     */
    public function count_upcomingMovie()
    {
        return $this->MovieDescriptionDao->count_upcomingMovie();
    }
    /**
     * get data for upcoming movie
     * @return Object UpcomingMovie
     */
    public function get_upcomingMovieData()
    {
        return $this->MovieDescriptionDao->get_upcomingMovieData();
    }
}
