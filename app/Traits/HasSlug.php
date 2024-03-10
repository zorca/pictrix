<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHasSlug()
    {
        static::saving(function (Model $model) {
            $slug = Str::slug($model->getAttribute('name'));
            $originalSlug = $slug;
            $slugCounter = 1;
            while (static::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '_'.$slugCounter++;
            }
            $model->setAttribute('slug', $slug);
        });
    }
}
