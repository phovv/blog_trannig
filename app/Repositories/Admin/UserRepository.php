<?php

namespace App\Repositories\Admin;

use App\Repositories\EloquentRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository extends EloquentRepository
{
    //get model
    public function getModel()
    {
        return User::class;
    }

    /**
     * Attempt to authenticate the user.
     *
     * @param mixed $request The login request data.
     * @return bool Returns true if authentication is successful, false otherwise.
     */
    public function login($request){
        return Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'deleted_date' => null,
        ]);
    }
}
