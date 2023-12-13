<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use Config\Constants\Messages;
use App\Http\Services\Admin\UserService;

class LoginController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * Constructor.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display the login form.
     *
     * @return view admin.screen.Login.login
     */
    public function index()
    {
        return view('admin.screen.Login.login', [
            'title' => 'Login'
        ]);
    }

    /**
     * Handle the login form submission.
     *
     * @param LoginRequest $request
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        return $this->userService->login($request) ? true : redirect()->back()->withInput()->withErrors(['error' => Messages::getMessage('ECL003')]);
    }
}
