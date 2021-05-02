<?php

declare(strict_types=1);

namespace KielD01\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * Class Meta
 * @package KielD01\Models
 * @property string        uuid
 * @property string        url
 * @property string        parent_type
 * @property positive-int  parent_id
 * @property Carbon        created_at
 * @property Carbon        updated_at
 * @property Carbon        deleted_at
 *
 * @property MorphTo|Model parent
 */
class Meta extends Model
{
	use SoftDeletes;

	protected $casts = [
		'parent_id' => 'integer',
	];

	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes);
		$this->setTable(config('laravel-meta.tables.meta.name', '__meta'));
	}

	public function parent(): MorphTo
	{
		return $this->morphTo();
	}

	public function setUuidAttribute(): void
	{
		$this->setAttribute('uuid', Str::uuid());
	}
}
