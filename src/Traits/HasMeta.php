<?php

declare(strict_types=1);

namespace KielD01\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * Trait HasMeta
 * @package KielD01\Traits
 * @property MorphOne|MorphMany|MorphToMany meta
 */
trait HasMeta
{
	public function meta()
	{
		$metaMorph = $this->__get('metaMorphType') ?? config('laravel-meta.defaultMorph', 'morphOne');

		return $this->{$metaMorph}(static::class, 'parent');
	}
}
