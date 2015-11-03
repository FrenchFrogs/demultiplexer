<?php namespace FrenchFrogs\Demultiplexer;

use Carbon\Carbon;
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
        $this->publishes([
            __DIR__.'/../database/migrations/create_demultiplexer_table.php' => database_path('migrations/' . Carbon::now()->format('Y_m_d_His') . '_create_demultiplexer_table.php'),
        ], 'migrations');
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
