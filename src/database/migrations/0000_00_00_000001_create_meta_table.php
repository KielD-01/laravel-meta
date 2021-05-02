<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaTable extends Migration
{
	public function up(): void
	{
		$table = config('laravel-meta.tables.meta.name', '__meta');

		if (!Schema::hasTable($table)) {
			Schema::create(
				$table,
				static function (Blueprint $table) {
					$table->uuid('uuid');
					$table->string('url')->nullable(true)->default(null);
					$table->string('parent_type')->nullable(false);
					$table->integer('parent_id')->nullable(false);
					$table->timestamps();
					$table->softDeletes();
				}
			);
		}
	}

	public function down(): void
	{
		$table = config('laravel-meta.tables.meta.name', '__meta');
		Schema::dropIfExists($table);
	}
}
