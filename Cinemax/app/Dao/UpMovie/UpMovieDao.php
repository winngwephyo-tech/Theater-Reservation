<?php

namespace App\Dao\UpMovie;

use App\Contracts\Dao\UpMovie\UpMovieDaoInterface;
use App\Models\UpcomingMovie;

class UpMovieDao implements UpMovieDaoInterface
{
    /**
     * Add new Movie
     * @param $request
     */
    public function store($request)
    {
        $request->validate([
            'poster' => 'required',
      ]);
        $input = $request->all();
        $input = $request->validated();
        if ($image = $request->file('poster')) {
            $destinationPath = 'upimage/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['poster'] = "$profileImage";
        }
        UpcomingMovie::create($input);
    }
    /**
     * Update Movie Data
     * @param $request and $id
     */
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
    /**
     * Delete Upcoming Movie By Id
     */
    public function deleteMovie($id)
    {
        UpcomingMovie::find($id)->delete();
        return redirect()->route('admin-movie');
    }
}
