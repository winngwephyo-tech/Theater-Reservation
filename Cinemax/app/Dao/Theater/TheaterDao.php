<?php

namespace App\Dao\Theater;

use App\Contracts\Dao\Theater\TheaterDaoInterface;
use App\Models\Theater;
use App\Models\Seat;

/**
 * Data accessing object for theater
 */
class TheaterDao implements TheaterDaoInterface
{
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
        $theater_id = Theater::create($data)->id;
        return $theater_id;
    }
    /**
     * To delete theater
     * @param Theater $theater_id
     * @return \Illuminate\Http\Response
     */
    public function deleteTheater($theater_id)
    {
        return Theater::where('id', '=', $theater_id)->delete();
        return Seat::where('theater_id', '=', $theater_id)->delete();
    }
}
