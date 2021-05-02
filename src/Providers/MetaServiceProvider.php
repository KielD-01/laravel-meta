<?php

declare(strict_types=1);

namespace KielD01\Providers;

use Illuminate\Support\ServiceProvider;

class MetaServiceProvider extends ServiceProvider
{
	private const PATHS = [
		'meta_config' => __DIR__.DIRECTORY_SEPARATOR.'..'.
			DIRECTORY_SEPARATOR.'configs'.
			DIRECTORY_SEPARATOR.'laravel-meta.php',
		'migration_path' => __DIR__.DIRECTORY_SEPARATOR.'..'.
			DIRECTORY_SEPARATOR.'database'.
			DIRECTORY_SEPARATOR.'migrations.'.
			DIRECTORY_SEPARATOR,
	];
	
	public function boot(): void
	{
		$this->loadConfig();
		$this->loadMigrations();
	}

	private function loadMigrations(): void
	{
		$this->loadMigrationsFrom(self::PATHS['migration_path']);
	}

	private function loadConfig(): void
	{
		$this->publishes(
			[
				self::PATHS['meta_config'] => config_path('laravel-meta.php'),
			]
		);
	}
}
