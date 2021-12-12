<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\RegisterUserRequest;
use App\Services\UserService;

class AuthController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterUserRequest $request)
    {
        $user = $this->userService->registerUser($request->all());
        return $user;
    }

    public function login(LoginUserRequest $request)
    {
        $login = $this->userService->loginUser($request->all());
        return $login;
    }

    public function logout()
    {
        $logout = $this->userService->logout();
        return $logout;
    }


}
