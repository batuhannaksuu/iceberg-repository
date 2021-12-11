<?php

namespace App\Http\Controllers;

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

       if($user) {
           $token = $user->createToken('Personal Access Token')->accessToken;
           return response()->json([
               'status' => true,
               'message' => 'User created',
               'data' => $user,
               'token' => $token
           ],201);
       } else {
            return response()->json([
               'status' => false,
               'message' => 'User not create',
            ],500);
       }
    }
}
