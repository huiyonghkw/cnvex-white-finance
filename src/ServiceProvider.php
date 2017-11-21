<?php 

namespace Bravist\CnvexWhiteFinance;

use Bravist\CnvexWhiteFinance\Api;
use GuzzleHttp\Client;
use Laravel\Lumen\Application as LumenApplication;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap.
     */
    public function boot()
    {
        $this->setupConfig();
    }
    /**
     * setupConfig.
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/config.php');
        if ($this->app instanceof LaravelApplication) {
            if ($this->app->runningInConsole()) {
                $this->publishes([
                    $source => config_path('cnvex_white_finance.php'),
                ]);
            }
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('cnvex_white_finance');
        }
        $this->mergeConfigFrom($source, 'cnvex_white_finance');
    }

    public function register()
    {
        $this->registerClassAliases();
        $this->app->singleton('cnvex_white_finance', function ($app) {
            return new Api(new Client(), config('cnvex_white_finance'));
        });
    }

    /**
     * Register the class aliases.
     *
     * @return void
     */
    protected function registerClassAliases()
    {
        $aliases = [
            'cnvex' => 'Bravist\CnvexWhiteFinance\Request',
        ];

        foreach ($aliases as $key => $aliases) {
            foreach ((array) $aliases as $alias) {
                $this->app->alias($key, $alias);
            }
        }
    }
}
