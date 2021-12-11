<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryContract;

class UserService
{
    protected $userRepositoryContract;

    public function __construct(UserRepositoryContract $userRepositoryContract)
    {
        $this->userRepositoryContract = $userRepositoryContract;
    }

    public function registerUser(array $data)
    {
        $userData = [
          'name' => $data['name'],
          'email' =>  $data['email'],
          'password' => bcrypt($data['password'])
        ];

        $newUser = $this->userRepositoryContract->registerUser($userData);

        return $newUser;

    }
}
