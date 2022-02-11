<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Factory as ValidationFactory;

class CustomValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    protected $valid_array_rules  = array("asc", "desc");
    public function boot()
    {
        Validator::extend('order', function($attribute, $value, $parameters, $validator) {
            return in_array($value, $this->valid_array_rules);
        },'The order must be asc or desc');
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
