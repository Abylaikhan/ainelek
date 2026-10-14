<?php

namespace App\Models;

use App\Helpers\FileHelper;
use App\Traits\Sluggable;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Blog
 *
 * @method static Builder|Blog newModelQuery()
 * @method static Builder|Blog newQuery()
 * @method static Builder|Blog query()
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $keywords
 * @property string|null $description
 * @property string $content
 * @property string|null $image
 * @property int $is_interesting
 * @property int|null $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Blog whereCategoryId($value)
 * @method static Builder|Blog whereContent($value)
 * @method static Builder|Blog whereCreatedAt($value)
 * @method static Builder|Blog whereDescription($value)
 * @method static Builder|Blog whereId($value)
 * @method static Builder|Blog whereImage($value)
 * @method static Builder|Blog whereIsInteresting($value)
 * @method static Builder|Blog whereKeywords($value)
 * @method static Builder|Blog whereSlug($value)
 * @method static Builder|Blog whereTitle($value)
 * @method static Builder|Blog whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Blog extends Model
{
    use HasFactory, Sluggable;

    private static array $sluggableConfig = ["slug_column" => "slug", "slug_from_column" => "title"];

    protected $guarded = ['id'];

    public function getImagePathAttribute(): string
    {
        return FileHelper::getFile($this->image);
    }

}
