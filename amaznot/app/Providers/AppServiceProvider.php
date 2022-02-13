<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Product;
use Exception;

class AppServiceProvider extends ServiceProvider
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
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        try {
            $categories = Product::select('category', 'subcategory')
                ->groupBy('subcategory', 'category')
                ->orderBy('category', 'desc')
                ->get();

            $headerData = array(
                "string" => $categories,
                "array" => $categories->toArray()
            );
        } catch (Exception $ex) {
            $headerData = array(
                "string" => HeaderStaticData::$categoriesString,
                "array" => HeaderStaticData::$categories
            );
        }

        View::share("headerData", $headerData);
    }
}
