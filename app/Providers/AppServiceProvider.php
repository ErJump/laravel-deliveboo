<?php

namespace App\Providers;

use Braintree;
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
        $environment = 'sandbox';
        $braintree = new \Braintree\Gateway([
            'environment' => $environment,
            'merchantId' => '4r8xcbvmm9m9g8kg',
            'publicKey' => 'ghbt2sf53zp3y4c8',
            'privateKey' => '8e1ea6e739da72677178bea8739069e3'
        ]);
        config(['braintree' => $braintree]);
    }
}
