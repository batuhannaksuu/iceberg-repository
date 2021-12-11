<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService, $responseHelper;
    public function __construct(UserService $userService,ResponseHelper $responseHelper)
    {
        $this->userService = $userService;
        $this->responseHelper = $responseHelper;
    }
    public function profile()
    {
        $user = $this->userService->getUser();
        return $this->responseHelper->successResponse(true,'get User',$user);
    }
}
