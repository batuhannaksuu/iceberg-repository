<?php

namespace App\Services;

use App\Helpers\ResponseHelper;
use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $userRepositoryContract,$responseHelper;

    public function __construct(UserRepositoryContract $userRepositoryContract,ResponseHelper $responseHelper)
    {
        $this->userRepositoryContract = $userRepositoryContract;
        $this->responseHelper = $responseHelper;
    }

    public function registerUser(array $data)
    {
        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ];
        $user = $this->userRepositoryContract->registerUser($userData);
        if ($user)
        {
            $token = $user->createToken('Personal Access Token');
            $newData = [
                'user' => $user,
                'token' => $token->accessToken,
                ];
            return $this->responseHelper->successResponse(true,'user created',$newData,201);
        } else {
            return $this->responseHelper->errorResponse(false,'Internal Server Error',500);
        }
    }

    public function loginUser(array $data)
    {
        $userData = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        $login = $this->userRepositoryContract->loginUser($userData);
        if ($login)
        {
            $user = Auth::user();
            $token = $user->createToken('Personal Access Token');
            $data = [
                'success' => true,
                'message' => 'success login',
                'access_token' => $token->accessToken,
                'token_type' => 'Bearer',
                'expirey_date' => $token->token->expires_at,
                'user' => $user
            ];
            return $this->responseHelper->successResponse(true,'User is logged in',$data);
        } else {
            return $this->responseHelper->errorResponse(false,'Unauthenticated',401);
        }
    }

    public function logout()
    {
        $token = $this->userRepositoryContract->logout();
        if($token != null) {
            $check = $token->revoke();
            return $this->responseHelper->successResponse(true, 'logout', $check);
        } else {
            return $this->responseHelper->errorResponse(false,'not Authenticate',400);
        }
    }
}
