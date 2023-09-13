<?php

namespace App\Providers;

use App\Models\Config\WebConfig;
use App\Models\Master\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        view()->composer('*', function ($view) {
            $category = Category::all();
            $view->with('global_category', $category);
        });

        if (Schema::hasTable('web_configs')) {
            view()->share([
                'app_name' => WebConfig::where(['name' => 'app_name'])->first()['value'] ?? '-',
                'app_logo' => WebConfig::where(['name' => 'app_logo'])->first()['file_path'] ?? '-',
                'email' => WebConfig::where(['name' => 'email'])->first()['value'] ?? '-',
                'address' => WebConfig::where(['name' => 'address'])->first()['value'] ?? '-',
                'facebook_link' => WebConfig::where(['name' => 'facebook_link'])->first()['value'] ?? '-',
                'linkedin_link' => WebConfig::where(['name' => 'linkedin_link'])->first()['value'] ?? '-',
                'instagram_link' => WebConfig::where(['name' => 'instagram_link'])->first()['value'] ?? '-',
                'app_home' => WebConfig::where(['name' => 'app_home'])->first()['value'] ?? '-',
                'app_login' => WebConfig::where(['name' => 'app_login'])->first()['value'] ?? '-',
                'app_signup' => WebConfig::where(['name' => 'app_signup'])->first()['value'] ?? '-',
                'app_header_web' => WebConfig::where(['name' => 'app_header_web'])->first()['value'] ?? '-',

            ]);
        }
        Paginator::useBootstrapFive();

    }
}
