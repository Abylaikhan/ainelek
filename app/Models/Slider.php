<?php

namespace App\Models;

use App\Helpers\FileHelper;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Slider
 *
 * @property int $id
 * @property string $title
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Slider newModelQuery()
 * @method static Builder|Slider newQuery()
 * @method static Builder|Slider query()
 * @method static Builder|Slider whereCreatedAt($value)
 * @method static Builder|Slider whereId($value)
 * @method static Builder|Slider whereImage($value)
 * @method static Builder|Slider whereTitle($value)
 * @method static Builder|Slider whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Slider extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getImagePathAttribute(): string
    {
        return FileHelper::getFile($this->image) ?: asset('assets/img/not-found.png');
    }

}
