<?php

namespace MichielKempen\LaravelGlide;

use Illuminate\Support\ServiceProvider;

class GlideServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/glide.php', 'glide');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}