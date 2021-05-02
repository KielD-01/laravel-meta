<?php

declare(strict_types=1);

namespace KielD01\Traits;

use Illuminate\Database\Eloquent\Relations\MorphTo;

trait HasMeta
{
	public function meta(): MorphTo
	{
		return $this->morphOne(static::class, 'parent');
	}
}
