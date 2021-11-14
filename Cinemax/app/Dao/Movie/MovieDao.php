<?php
namespace App\Dao\Movie;

use App\Contracts\Dao\Movie\MovieDaoInterface;
use App\Models\Movie;

class MovieDao implements MovieDaoInterface
{
    /**
     * To get Movies
     * @return $Movies
     */
    public function getMovies()
    {
        $movie = Movie::latest()->paginate(5);
        return $movie;
    }
    /**
     * Add new Movie
     * @param $request
     */
    public function store($request)
    {
        $input = $request->all();
        $input=$request->validated();
        if ($image = $request->file('poster')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['poster'] = "$profileImage";
          }
          //return $input;
           Movie::create($input);
    }

    public function update($request, $movie){
        $input = $request->all();
        $input=$request->validated();
  
        if ($image = $request->file('poster')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['poster'] = "$profileImage";
        }else{
            unset($input['poster']);
        }
        
        $movie->update($input);

    }


}