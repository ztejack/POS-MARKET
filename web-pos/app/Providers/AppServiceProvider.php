<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        // Gate User Level
        Gate::define('userlevel', function (User $user) {
            return $user->level_id == 3;
        });
        Gate::define('kasirlevel', function (User $user) {
            return $user->level_id == 2;
        });
        Gate::define('kasiradminlevel', function (User $user) {
            return $user->level_id !== 3;
        });
        Gate::define('adminlevel', function (User $user) {
            return $user->level_id == 1;
        });

        // Format Mata Uang
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });
        Blade::directive('incurrency', function ($expression) {
            return "<?php echo number_format($expression,0,',','.'); ?>";
        });

        // Gate::define('userlevel', function (User $user) {
        //     return $user->isAdmin == true;
        // });
    }
}
