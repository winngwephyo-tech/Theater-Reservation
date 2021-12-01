<?php

namespace App\Dao\UpMovie;

use App\Contracts\Dao\UpMovie\UpMovieDaoInterface;
use App\Models\UpcomingMovie;
use Illuminate\Support\Facades\DB;

class UpMovieDao implements UpMovieDaoInterface
{
    /**
     * Add new Movie
     * @param  \Illuminate\Http\Request  $request
     * @return void
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
        DB::transaction(function () use ($input) {
            UpcomingMovie::create($input);
        });
    }
    /**
     * Update Movie Data
     * @param  \Illuminate\Http\Request  $request
     * @param UpcomingMovie $id
     * @return void
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
        return   DB::transaction(function () use ($id, $input) {
            UpcomingMovie::where('id', '=', $id)->update($input);
        });
    }
    /**
     * Delete Upcoming Movie By Id
     * @param UpcomingMovie $id
     * @return view
     */
    public function deleteMovie($id)
    {
        DB::transaction(function () use ($id) {
            UpcomingMovie::find($id)->delete();
        });
        return redirect()->route('admin-movie');
    }
}
