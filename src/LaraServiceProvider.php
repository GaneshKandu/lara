<?php

namespace ganeshkandu\lara;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LaraServiceProvider extends ServiceProvider{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerRoutes();
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
            'namespace' => 'ganeshkandu/lara',
			'prefix' => config('lara.path'),
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
		
	}
}
