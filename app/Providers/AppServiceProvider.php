<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('abilities', function() {
            return include base_path('data/abilities.php');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        View::share('name', 'name_' . app()->currentLocale());
        View::share('title', 'title_' . app()->currentLocale());
        View::share('description', 'description_' . app()->currentLocale());
        View::share('file_name', 'file_name_' . app()->currentLocale());
        View::share('feedback', 'feedback_' . app()->currentLocale());
        View::share('Specialization', 'Specialization_' . app()->currentLocale());
        View::share('feature', 'feature_' . app()->currentLocale());

        //Authouration
        Gate::before(function ($user, $ability) {
            if($user instanceof User) {
                if($user->super_admin) {
                    return true;
                }
            }
        });
        // // the Authorization for Report Page
        // Gate::define('report.view', function ($user) {
        //     if($user instanceof User) {
        //         if($user->roles->contains('role_name', 'report.view')) {
        //             return true;
        //         }
        //         return false;
        //     }
        // });
        // Gate::policy(FixedEntries::class, FixedEntriesPolicy::class);

    }
}
