<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        $this->app->bind(\App\Interfaces\BaselinkerRepositoryInterface::class, \App\Utils\BaselinkerRepository::class);
        $this->app->bind(\App\Interfaces\InPostRepositoryInterface::class, \App\Utils\InPostRepository::class);
        $this->app->bind(\App\Interfaces\DPDRepositoryInterface::class, \App\Utils\DPDRepository::class);
//        if ($this->app->environment('local')) {
//            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
//            $this->app->register(TelescopeServiceProvider::class);
//        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('estDeliveryDate', function ($expression) {
            return "<?php echo e(getEstimatedDelivery($expression)); ?>";
        });

        Blade::directive('renderStars', function ($expression) {
            return "<?php echo renderStars($expression); ?>";
        });

        Blade::directive('renderCart', function ($expression) {
            return "<?php echo renderCart($expression); ?>";
        });
    }
}
