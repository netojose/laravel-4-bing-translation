<?php namespace Sputinyk\BingTranslation;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use \Config;

class BingTranslationServiceProvider extends ServiceProvider {

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
    public function boot() {
            $this->package( 'sputinyk/bingtranslation' );
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
		$this->app[ 'bing' ] = $this->app->share( function( $app ) {
			require_once( 'lib/BingTranslate.class.php' );

			$api_key = Config::get( 'bingtranslation::api_key' );
			$cacheEnabled = Config::get( 'bingtranslation::cache_enabled' );
			
			$translator = new \BingTranslateWrapper( $api_key );
			$translator->cacheEnabled( $cacheEnabled );
			return $translator;
		});

		// Shortcut so developers don't need to add an Alias in app/config/app.php
        $this->app->booting( function() {
	        $loader = AliasLoader::getInstance();
	        $loader->alias( 'Bing', 'Sputinyk\BingTranslation\Facades\Bing' );
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return array();
	}

}