<?php

namespace App\Contracts\Services\User;

/**
 * Interface for Services of user
 */
interface UserServiceInterface
{
    /**
     * To get user by id
     * @param string $id user id
     * @return Object $user user object
     */
    public function getUserById($id);
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function saveUser($request);
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function submitUserEditView($request);
    /**
     * To change user password
     * @param array $validated Validated values from request
     * @return Object $user user object
     */
    public function changeUserPassword($request);
}
