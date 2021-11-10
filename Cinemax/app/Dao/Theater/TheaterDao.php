<?php

namespace App\Dao\Theater;

use App\Contracts\Dao\Theater\TheaterDaoInterface;
use App\Models\Theater;
use Illuminate\Http\Request;

/**
 * Data accessing object for theater
 */
class TheaterDao implements TheaterDaoInterface
{
    /**
     * To add theaters
     * @param $request request with inputs
     * @return $theater_id
     */
    public function addTheaters($request)
    {
        $name = $request->input('name');
        $address = $request->input('address');
        $data = ['name' => $name, 'address' => $address];
        $theater_id = Theater::create($data)->id;
        return $theater_id;
    }
}
