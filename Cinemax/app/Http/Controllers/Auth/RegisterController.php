<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    private $userInterface;

    public function __construct(UserServiceInterface $UserServiceInterface)
    {
        $this->userInterface = $UserServiceInterface;
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(UserRegisterRequest $request)
    {
        $request = $request->validated();
        $this->userInterface->saveUser($request);
        return redirect()->route('login');
    }
}
