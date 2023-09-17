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
            // front
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
            // generate certificate
                'name_x' => WebConfig::where(['name' => 'name_x'])->first()['value'] ?? '-',
                'name_y' => WebConfig::where(['name' => 'name_y'])->first()['value'] ?? '-',
                'date_x' => WebConfig::where(['name' => 'date_x'])->first()['value'] ?? '-',
                'date_y' => WebConfig::where(['name' => 'date_y'])->first()['value'] ?? '-',
                'pdf_file' => WebConfig::where(['name' => 'pdf_file'])->first()['file_path'] ?? '-',
                'csv_file' => WebConfig::where(['name' => 'csv_file'])->first()['file_path'] ?? '-',
                'email_body' => WebConfig::where(['name' => 'email_body'])->first()['value'] ?? '-',
            ]);
        }
        Paginator::useBootstrapFive();

    }
}
