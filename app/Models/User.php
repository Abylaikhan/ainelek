<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read Collection|null $addresses
 * @property-read Collection|null $orders
 * @method static UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bitrix_id',
        'name',
        'email',
        'password',
        'phone',
        'company_name',
        'bin',
        'bank',
        'kbe',
        'bik',
        'account_number',
        'address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const USER = 2;
    const DEALER = 3;
    const DISTRIBUTOR = 4;


    const BITRIX_ROLE_USER = 84;
    const BITRIX_ROLE_DEALER = 86;
    const BITRIX_ROLE_DISTRIBUTOR = 88;


    public static function rolesList(): array
    {
        return [
            self::USER        => 'Покупатель',
            self::DEALER      => 'Дилер',
            self::DISTRIBUTOR => 'Дистрибьютор',
        ];
    }

    public static function bitrixRolesList(): array
    {
        return [
            self::USER        => self::BITRIX_ROLE_USER,
            self::DEALER      => self::BITRIX_ROLE_DEALER,
            self::DISTRIBUTOR => self::BITRIX_ROLE_DISTRIBUTOR,
        ];
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function getBitrixRoleAttribute(): string
    {
        foreach ($this->roles as $role) {
            if (in_array($role->id, [self::USER, self::DEALER, self::DISTRIBUTOR])) {
                return self::bitrixRolesList()[$role->id];
            }
        }

        return self::BITRIX_ROLE_USER;
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
