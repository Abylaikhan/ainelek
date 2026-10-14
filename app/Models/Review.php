<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Review
 *
 * @property int $id
 * @property string $full_name
 * @property string $text
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Review newModelQuery()
 * @method static Builder|Review newQuery()
 * @method static Builder|Review query()
 * @method static Builder|Review whereCreatedAt($value)
 * @method static Builder|Review whereFullName($value)
 * @method static Builder|Review whereId($value)
 * @method static Builder|Review whereText($value)
 * @method static Builder|Review whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Review extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

}
