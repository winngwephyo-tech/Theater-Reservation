<?php

namespace App\Dao\Theater;

use App\Contracts\Dao\Theater\TheaterDaoInterface;
use App\Models\Theater;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Data accessing object for theater
 */
class TheaterDao implements TheaterDaoInterface
{
    /**
     * To get all theaters
     * @return $theaters
     */
    public function getTheaters()
    {
        $theaters = Theater::all();
        return $theaters;
    }
    /**
     * To add theaters
     *  @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @return  $theater_id
     */
    public function addTheaters($request)
    {
        $name = $request->input('name');
        $address = $request->input('address');
        $data = ['name' => $name, 'address' => $address];
        return DB::transaction(function () use ($data) {
            return $theater_id = Theater::create($data)->id;
        });
    }
    /**
     * To delete theater
     * @param Theater $theater_id
     * @return \Illuminate\Http\Response
     */
    public function deleteTheater($theater_id)
    {
        DB::transaction(function () use ($theater_id) {
            Theater::where('id', '=', $theater_id)->delete();
            Seat::where('theater_id', '=', $theater_id)->delete();
        });
    }
}
