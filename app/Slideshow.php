<?php

namespace App;

use App\Concern\Mediable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model {
	use Sluggable, Mediable;

	/**
	 * Return the sluggable configuration array for this model.
	 *
	 * @return array
	 */
	public function sluggable() {
		return [
			'slug' => [
				'source' => 'title'
			]
		];
	}

	protected $fillable = [
		'user_id',
		'title',
		'sub_title',
        'link',
		'slug',
		'caption',
        'active',
		'status','priority'
	];

	/**
	 * Return the post's author
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
		return $this->belongsTo( User::class );
	}
}
