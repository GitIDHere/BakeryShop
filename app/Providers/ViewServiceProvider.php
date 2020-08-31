<?php namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
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
        View::composer('partials.home._category_selection', 'App\Http\View\Composers\Home\CategorySectionViewComposer');
        View::composer('partials.home._fresh_new_products', 'App\Http\View\Composers\Home\PromotedProductsViewComposer');
        View::composer('partials.home._suggestions', 'App\Http\View\Composers\Home\SuggestionsViewComposer');
    }
}