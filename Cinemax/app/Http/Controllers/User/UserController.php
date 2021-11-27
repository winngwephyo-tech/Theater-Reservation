<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieInfoRequest;
use App\Contracts\Services\Movie\MovieServiceInterface;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserPasswordChangeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $userInterface;

    public function __construct(UserServiceInterface $UserServiceInterface)
    {
        $this->userInterface = $UserServiceInterface;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUserEditView()
    {
        $userId = Auth::user()->id;
        $user = $this->userInterface->getUserById($userId);
        $title = "Edit Profile";
        return view('user.edit_user')->with(['user' => $user]);
    }
    /**
     * Update the user info in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function submitUserEditView(UserEditRequest $request)
    {
        $request->validated();
        $user = $this->userInterface->submitUserEditView($request);
        return redirect('/');
    }
    /**
     * To Show the application dashboard.
     * @param UserPasswordChangeRequest $request request for password change
     * @return View user profile
     */
    public function changePassword(UserPasswordChangeRequest $request)
    {
        $request->validated();
        $this->userInterface->changeUserPassword($request);
        return redirect('/');
    }
}
