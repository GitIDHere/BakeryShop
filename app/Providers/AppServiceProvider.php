<?php

namespace App\Providers;

use App\Http\Helpers\ErrorLogger;
use App\Repositories\BreadRepository;
use App\Repositories\DietaryRepository;
use App\Repositories\IngredientRepository;
use App\Repositories\Interfaces\IBreadRepository;
use App\Repositories\Interfaces\IDietaryRepository;
use App\Repositories\Interfaces\IIngredientRepository;
use App\Repositories\Interfaces\IModelRepository;
use App\Repositories\Interfaces\INutritionRepository;
use App\Repositories\Interfaces\IProductRepository;
use App\Repositories\Interfaces\IProductTypeRepository;
use App\Repositories\Interfaces\IRatingRepository;
use App\Repositories\Interfaces\IUserAddressRepository;
use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\ModelRepository;
use App\Repositories\NutritionRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductTypeRepository;
use App\Repositories\RatingRepository;
use App\Repositories\UserAddressRepository;
use App\Repositories\UserRepository;
use App\Services\BreadService;
use App\Services\DietaryService;
use App\Services\IngredientService;
use App\Services\Interfaces\IBreadService;
use App\Services\Interfaces\IDietaryService;
use App\Services\Interfaces\IIngredientService;
use App\Services\Interfaces\IModelService;
use App\Services\Interfaces\INutritionService;
use App\Services\Interfaces\IProductService;
use App\Services\Interfaces\IProductTypeService;
use App\Services\Interfaces\IRatingService;
use App\Services\Interfaces\IUserAddressService;
use App\Services\Interfaces\IUserService;
use App\Services\ModelService;
use App\Services\NutritionService;
use App\Services\ProductService;
use App\Services\ProductTypeService;
use App\Services\RatingService;
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

		IBreadService::class => BreadService::class,
		IDietaryService::class => DietaryService::class,
		IIngredientService::class => IngredientService::class,
		IModelService::class => ModelService::class,
		INutritionService::class => NutritionService::class,
		IProductService::class => ProductService::class,
		IProductTypeService::class => ProductTypeService::class,
		IRatingService::class => RatingService::class,

		IUserRepository::class => UserRepository::class,
		IUserAddressRepository::class => UserAddressRepository::class,
		IModelRepository::class => ModelRepository::class,
		IBreadRepository::class => BreadRepository::class,
		IDietaryRepository::class => DietaryRepository::class,
		IIngredientRepository::class => IngredientRepository::class,
		INutritionRepository::class => NutritionRepository::class,
		IRatingRepository::class => RatingRepository::class,
		IProductRepository::class => ProductRepository::class,
		IProductTypeRepository::class => ProductTypeRepository::class,

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
