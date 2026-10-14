<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    private static $__sluggableConfig = ["slug_column" => "slug", "slug_from_column" => "title"];

    protected static function bootSluggable()
    {

        self::setSluggableConfig();  // set initial config for sluggable

        static::creating(function ($model) {
            $model->{self::$__sluggableConfig['slug_column']} = $model->generateUniqueSlug($model->{self::$__sluggableConfig['slug_from_column']}, 0, self::$__sluggableConfig['slug_column']);
        });

        static::updating(function ($model) {
            $model->{self::$__sluggableConfig['slug_column']} = $model->generateUniqueSlug($model->{self::$__sluggableConfig['slug_from_column']}, 0, self::$__sluggableConfig['slug_column'], $model->id);
        });
    }

    private static function setSluggableConfig()
    {
        if (isset(self::$sluggableConfig['slug_column'])) {
            self::$__sluggableConfig['slug_column'] = self::$sluggableConfig['slug_column'];
        } else {
            self::$__sluggableConfig['slug_column'] = "slug";
        }

        if (isset(self::$sluggableConfig['slug_from_column'])) {
            self::$__sluggableConfig['slug_from_column'] = self::$sluggableConfig['slug_from_column'];
        } else {
            self::$__sluggableConfig['slug_from_column'] = "title";
        }

    }

    private function generateUniqueSlug($name, $counter = 0, $slugField = "slug", $record_id = 0)
    {
        $updatedName = $counter == 0 ? $name : $name . "-" . $counter;

        if($record_id){
            $model = static::where($slugField, Str::slug($updatedName))->first();
            if ($model && $model->id == $record_id) {
                return Str::slug($updatedName);
            }
        }
        if (static::where($slugField, Str::slug($updatedName))->exists()) {
            return $this->generateUniqueSlug($name, $counter + 1);
        }
        return Str::slug($updatedName);
    }
}
