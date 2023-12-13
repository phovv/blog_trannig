<?php

namespace App\Http\Services\Admin;

use App\Repositories\Admin\UserRepository;

class UserService
{    /**
    * @var UserRepository
    */
   protected $userRepository;

   /**
    * UserService constructor.
    *
    * @param UserRepository $userRepository
    */   
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Attempt to log in the user.
     *
     * @param mixed $request The login request data.
     * @return mixed Returns the result of the login operation.
     */
    public function login($request){
        return $this->userRepository->login($request);
    }
}
