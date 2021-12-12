<?php

namespace App\Repositories\Contracts;

interface UserRepositoryContract
{
    public function registerUser(array $data);
    public function loginUser(array $data);
    public function logout();
}
