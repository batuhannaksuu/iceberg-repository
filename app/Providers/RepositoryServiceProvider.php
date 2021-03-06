<?php

namespace App\Providers;

use App\Repositories\AppointmentRepository;
use App\Repositories\ContactRepository;
use App\Repositories\Contracts\AppointmentRepositoryContract;
use App\Repositories\Contracts\AuthRepositoryContact;
use App\Repositories\Contracts\ContactRepositoryContract;
use App\Repositories\Contracts\OfficeRepositoryContract;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\OfficeRepository;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind(UserRepositoryContract::class,UserRepository::class);
        $this->app->bind(AppointmentRepositoryContract::class,AppointmentRepository::class);
        $this->app->bind(ContactRepositoryContract::class,ContactRepository::class);
        $this->app->bind(OfficeRepositoryContract::class,OfficeRepository::class);
        parent::register();
    }
}
