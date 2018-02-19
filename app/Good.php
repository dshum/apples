<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Good extends Model
{
    use SoftDeletes;

    public function getHref()
	{
		return route('good', $this->id);
	}

	public static function boot()
	{
		parent::boot();

        static::created(function($element) {
            cache()->tags('goods')->flush();
        });

        static::saved(function($element) {
            cache()->tags('goods')->flush();
        });

        static::deleted(function($element) {
            cache()->tags('goods')->flush();
        });
    }
}
