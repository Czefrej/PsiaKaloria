<?php

namespace App\Providers;

use DateTime;
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
        $this->app->bind('App\Interfaces\BaselinkerRepositoryInterface', 'App\Utils\BaselinkerRepository');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('estDeliveryDate',function($expression){
            return "<?php echo e(getEstimatedDelivery($expression)); ?>";
        });
    }
}
