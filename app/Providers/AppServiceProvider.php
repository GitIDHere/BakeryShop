<?php

namespace App\Providers;

use App\Http\Helpers\ErrorLogger;
use App\Repositories\Interfaces\IUserAddressRepository;
use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\UserAddressRepository;
use App\Repositories\UserRepository;
use App\Services\Interfaces\IUserAddressService;
use App\Services\Interfaces\IUserService;
use App\Services\UserAddressService;
use App\Services\UserService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Psr\Log\LoggerInterface;

class AppServiceProvider extends ServiceProvider
{


	public $bindings = [

		IUserService::class => UserService::class,
		IUserAddressService::class => UserAddressService::class,

		IUserRepository::class => UserRepository::class,
		IUserAddressRepository::class => UserAddressRepository::class,
		LoggerInterface::class => ErrorLogger::class,
	];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Schema::enableForeignKeyConstraints();
    }
}
