<?php namespace Regeneration\Character;
use Illuminate\Support\ServiceProvider;
use App\Artisan\InstallCommand;
use App\Artisan\SimulationCommand;

class CharacterServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$dir = __DIR__ . '/../../';

		$this->setupResources($dir);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// Register commands
		$this->registerCommands();

		// List of commands
        $this->commands( array('install', 'simulation') );
	}

	/**
	 * Register all commands available in the package
	 *
	 * @return void
	 */
	private function registerCommands()
    {
        $this->app['install'] = $this->app->share(function($app)
        {
            return new InstallCommand;
        });
        $this->app['simulation'] = $this->app->share(function($app)
        {
            return new SimulationCommand;
        });
    }

    /**
     * Setup routing, configs, and views
     */
    private function setupResources($dir)
    {
		// Include routes
		include $dir . 'routes.php';

		// Set directory
		$this->loadViewsFrom($dir . 'views', 'character');

		// Set config
		$config = $dir . 'config/multiplayer.php';
        $this->mergeConfigFrom($config, 'character::multiplayer');
        $config = $dir . 'config/app.php';
        $this->mergeConfigFrom($config, 'app');

        $this->publishes([
		    realpath($dir . 'migrations') => $this->app->databasePath() . '/migrations',
		]);
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
