<?php namespace Demultiplexer;

use Illuminate\Support\ServiceProvider;

class DemultiplexerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([ __DIR__ . '/../migrations/' => base_path('database/migrations')], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}