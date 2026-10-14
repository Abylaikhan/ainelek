<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contact
 *
 * @method static Builder|Contact newModelQuery()
 * @method static Builder|Contact newQuery()
 * @method static Builder|Contact query()
 * @property int $id
 * @property string $content
 * @property int $type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $type
 * @method static Builder|Contact whereContent($value)
 * @method static Builder|Contact whereCreatedAt($value)
 * @method static Builder|Contact whereId($value)
 * @method static Builder|Contact whereTypeId($value)
 * @method static Builder|Contact whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Contact extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const TYPE_PHONE = 1;
    const TYPE_EMAIL = 2;
    const TYPE_ADDRESS = 3;
    const TYPE_MAP = 4;
    const TYPE_WHATSAPP = 5;
    const TYPE_TELEGRAM = 6;
    const TYPE_FB = 7;
    const TYPE_INSTAGRAM = 8;
    const TYPE_ADDRESS_MENU = 9;
    const TYPE_WORK_TIME = 10;

    public static function types(): array
    {
        return [
            self::TYPE_PHONE => 'Телефон',
            self::TYPE_EMAIL => 'Email',
            self::TYPE_ADDRESS => 'Адрес',
            self::TYPE_WHATSAPP => 'WhatsApp',
            self::TYPE_TELEGRAM => 'Telegram',
            self::TYPE_FB => 'Facebook',
            self::TYPE_INSTAGRAM => 'Instagram',
            self::TYPE_MAP => 'Карта',
        ];
    }

    public function getTypeAttribute()
    {
        return self::types()[$this->type_id];
    }
}
