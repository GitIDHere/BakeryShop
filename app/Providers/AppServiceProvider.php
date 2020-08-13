<?php

namespace App\Providers;

use App\Http\Helpers\ErrorLogger;
use App\Repositories;
use App\Repositories\Interfaces as RepoInterfaces;
use App\Services;
use App\Services\Interfaces AS ServiceInterfaces;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Psr\Log\LoggerInterface;

class AppServiceProvider extends ServiceProvider
{
	public $bindings = [
		ServiceInterfaces\IUserService::class => Services\UserService::class,
		ServiceInterfaces\IUserAddressService::class => Services\UserAddressService::class,

		ServiceInterfaces\IBreadService::class => Services\BreadService::class,
		ServiceInterfaces\IDietaryService::class => Services\DietaryService::class,
		ServiceInterfaces\IIngredientService::class => Services\IngredientService::class,
		ServiceInterfaces\IModelService::class => Services\ModelService::class,
		ServiceInterfaces\INutritionService::class => Services\NutritionService::class,
		ServiceInterfaces\IProductService::class => Services\ProductService::class,
		ServiceInterfaces\IProductTypeService::class => Services\ProductTypeService::class,
		ServiceInterfaces\IRatingService::class => Services\RatingService::class,
		ServiceInterfaces\IProductTypeImageService::class => Services\ProductTypeImageService::class,
		ServiceInterfaces\ICategoriesService::class => Services\CategoryService::class,

		RepoInterfaces\IUserRepository::class => Repositories\UserRepository::class,
		RepoInterfaces\IUserAddressRepository::class => Repositories\UserAddressRepository::class,
		RepoInterfaces\IModelRepository::class => Repositories\ModelRepository::class,
		RepoInterfaces\IBreadRepository::class => Repositories\BreadRepository::class,
		RepoInterfaces\IDietaryRepository::class => Repositories\DietaryRepository::class,
		RepoInterfaces\IIngredientRepository::class => Repositories\IngredientRepository::class,
		RepoInterfaces\INutritionRepository::class => Repositories\NutritionRepository::class,
		RepoInterfaces\IRatingRepository::class => Repositories\RatingRepository::class,
		RepoInterfaces\IProductRepository::class => Repositories\ProductRepository::class,
		RepoInterfaces\IProductTypeRepository::class => Repositories\ProductTypeRepository::class,
		RepoInterfaces\IProductTypeImageRepository::class => Repositories\ProductTypeImageRepository::class,
		RepoInterfaces\ICategoryRepository::class => Repositories\CategoryRepository::class,

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
