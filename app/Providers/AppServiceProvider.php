<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Currency @Helper *To* Blade
        Blade::directive('money', function($monto){
            return "<?php echo '$' . number_format($monto, 2); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('GuzzleHttp\Client', function(){
            return new Client([
                'base_uri' => 'http://137.184.97.127:4000/'
            ]);
        });
    }
}
