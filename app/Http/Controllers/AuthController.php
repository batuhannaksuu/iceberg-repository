<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\RegisterUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

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

        if ($user) {
            $token = $user->createToken('Personal Access Token')->accessToken;
            return response()->json([
                'status' => true,
                'message' => 'User created',
                'data' => $user,
                'token' => $token
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User not create',
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $user = $this->userService->loginUser($request->all());
        if($user) {
            $token = $user->createToken('Personal Access Token');

            return response()->json([
                'status' => true,
                'message' => 'success login',
                'access_token' => $token->accessToken,
                'token_type' => 'Bearer',
                'expirey_date' => $token->token->expires_at,
                'user' => $user
            ], 200);
        } else {
            return response()->json([
               'status' => false,
               'message' => 'Unauthorised'
            ],401);
        }

    }

}
