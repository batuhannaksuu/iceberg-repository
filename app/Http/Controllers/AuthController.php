<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\RegisterUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userService,$responseHelper;

    /**
     * @param UserService $userService
     * @param ResponseHelper $responseHelper
     */
    public function __construct(UserService $userService, ResponseHelper $responseHelper)
    {
        $this->userService = $userService;
        $this->responseHelper = $responseHelper;
    }

    /**
     * @param RegisterUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterUserRequest $request)
    {
        $user = $this->userService->registerUser($request->all());

        if ($user) {
            $token = $user->createToken('Personal Access Token')->accessToken;

            $data = [
                'success' => true,
                'message' => 'User created',
                'data' => $user,
                'token' => $token
            ];
            return $this->responseHelper->successResponse(true,'User created',$data,201);

        } else {
            return $this->responseHelper->errorResponse(false,'user not create',500);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginUserRequest $request)
    {
        $user = $this->userService->loginUser($request->all());
        if($user) {
            $token = $user->createToken('Personal Access Token');
            $data = [
                'success' => true,
                'message' => 'success login',
                'access_token' => $token->accessToken,
                'token_type' => 'Bearer',
                'expirey_date' => $token->token->expires_at,
                'user' => $user
            ];
            return $this->responseHelper->successResponse(true,'User login',$data);
        } else {
            return $this->responseHelper->errorResponse(false,'Unauthenticated',401);
        }
    }


}
