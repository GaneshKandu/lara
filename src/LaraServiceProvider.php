<?php

namespace ganeshkandu\lara;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;

class LaraServiceProvider extends ServiceProvider{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->mergeConfigFrom(
            __DIR__.'/../config/lara.php', 'lara'
        );
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerCommands();
		$this->registerMigrations();
		$this->registerRoutes();
		$this->registerMiddleware();
		$this->registerResources();
	}

	/**
     * Register the lara resources.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom([__DIR__.'/../resources/views'], 'lara');
    }

	/**
	 * Register the package routes.
	 *
	 * @return void
	 */
	protected function registerRoutes()
	{
		Route::group([
			'namespace' => 'ganeshkandu\lara\Http\Controllers',
			'prefix' => config('lara.path'),
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
	}

	/**
	 * Register the package MiddleWare.
	 *
	 * @return void
	 */
	protected function registerMiddleware()
	{
		$kernel = $this->app->make(Kernel::class);

		/**
		 * Global Middleware
		 */
		// add at start of Global MiddleWare stack
		//$kernel->prependMiddleware(Http\Middleware\Test::class);
		// add at end of Global MiddleWare stack
		//$kernel->pushMiddleware(Http\Middleware\Test::class);

		/**
		 * Group Middleware
		 */
		// add at start of Group MiddleWare stack
		//$kernel->prependMiddlewareToGroup('group_name', \App\Http\Middleware\YourMiddleware::class);
		// add at end of Group MiddleWare stack
		//$kernel->pushMiddlewareToGroup('group_name', \App\Http\Middleware\YourMiddleware::class);

		/**
		 * Route Middleware
		 */
		// add at start of Route MiddleWare stack
		//$kernel->prependRouteMiddleware('group_name', \App\Http\Middleware\YourMiddleware::class);
		// add at end of Route MiddleWare stack
		//$kernel->pushRouteMiddleware('group_name', \App\Http\Middleware\YourMiddleware::class);

	}

	protected function registerMigrations()
    {
        if ($this->app->runningInConsole()){
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }
	
	protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\TestCommand::class,
            ]);
        }
    }
}
