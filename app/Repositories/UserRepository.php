<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryContract
{
    public function registerUser(array $data)
    {
        try {
            $newUser = new User();
            $newUser->fill($data);
            $newUser->save();

            return $newUser;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function loginUser(array $data)
    {
        try {
            $user = Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
            return $user;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function logout()
    {
        try {
            $token = Auth::user()->token();
            return $token;
        } catch (\Exception $e)
        {
            return $e->getMessage();
        }

    }

}
