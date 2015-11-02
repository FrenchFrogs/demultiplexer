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
        $this->publishConfig();
        $this->publishMigration();
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

    public function publishMigration()
    {
        $this->publishes([ __DIR__ . '/../migrations/' => base_path('database/migrations')], 'migrations');
    }

    public function publishConfig()
    {
        $this->publishes([ __DIR__ . '/../config/demultiplexer.php' => config_path('demultiplexer.php'), 'config']);
    }
}
