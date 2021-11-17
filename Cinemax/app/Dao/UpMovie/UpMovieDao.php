<?php

namespace App\Dao\UpMovie;

use App\Contracts\Dao\UpMovie\UpMovieDaoInterface;
use App\Models\UpcomingMovie;

class UpMovieDao implements UpMovieDaoInterface
{    /**
     * Add new Movie
     * @param $request
     */
    public function store($request)
    {
        $input = $request->all();
        $input = $request->validated();
        if ($image = $request->file('poster')) {
            $destinationPath = 'upimage/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['poster'] = "$profileImage";
        }
        //return $input;
        UpcomingMovie::create($input);
    }

    public function update($request, $movie)
    {
        $input = $request->all();
        $input = $request->validated();

        if ($image = $request->file('poster')) {
            $destinationPath = 'upimage/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['poster'] = "$profileImage";
        } else {
            unset($input['poster']);
        }

        $movie->update($input);
    }
}