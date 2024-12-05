<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('name', 'name_' . app()->currentLocale());
        View::share('title', 'title_' . app()->currentLocale());
        View::share('description', 'description_' . app()->currentLocale());
        View::share('file_name', 'file_name_' . app()->currentLocale());
        View::share('feedback', 'feedback_' . app()->currentLocale());
        View::share('Specialization', 'Specialization_' . app()->currentLocale());

    }
}
