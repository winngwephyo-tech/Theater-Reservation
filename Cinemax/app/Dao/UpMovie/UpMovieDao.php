<?php

namespace App\Dao\UpMovie;

use App\Contracts\Dao\UpMovie\UpMovieDaoInterface;
use App\Models\Movie;
use App\Models\UpcomingMovie;

class UpMovieDao implements UpMovieDaoInterface
{
    /**
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
        //dd($input);
        UpcomingMovie::create($input);
    }

    public function update($request, $id)
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
        UpcomingMovie::where('id', '=', $id)->update($input);
    }
    public function deleteMovie($id)
    {   
        UpcomingMovie::find($id)->delete();
        return redirect()->route('admin_movie');
    }
}
