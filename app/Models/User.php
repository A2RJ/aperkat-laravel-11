<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property mixed|null $password
 * @property string $avatar
 * @property string|null $whatsapp
 * @property string $tree_structure
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTreeStructure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWhatsapp($value)
 * @property string|null $bank_name
 * @property string|null $bank_account_number
 * @property string|null $bank_account_name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $role
 * @property-read int|null $role_count
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 * @property-read \App\Models\Role|null $strictRole
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'whatsapp'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->hasMany(Role::class);
    }

    public function strictRole()
    {
        return $this->hasOne(Role::class);
    }

    public function allRoleId()
    {
        return auth()->user()->strictRole->pluck('id')->toArray();
    }

    public function roles()
    {
        return Auth::user()->strictRole->role;
    }

    public function superAdmin()
    {
        return $this->strictRole->id == 1;
    }
    public function wr2()
    {
        return $this->strictRole->id == 5 || $this->superAdmin();
    }

    public function dirKeuangan()
    {
        return $this->strictRole->id == 6;
    }

    public function rektor()
    {
        return $this->strictRole->id == 4;
    }

    public function dirKeuanganPencairan()
    {
        return $this->strictRole->id == 3;
    }

    public function dirKeuanganLpj()
    {
        return $this->strictRole->id == 2;
    }

    public function user()
    {
        if ($this->superAdmin() || $this->wr2() || $this->dirKeuangan() || $this->rektor() || $this->dirKeuanganLpj() || $this->dirKeuanganPencairan()) {
            return false;
        }
        return true;
    }


    public function hasSubDivision(bool $filter = true)
    {
        $role = Auth::user()->role;
        $role_id = $role->pluck('id');
        $subdivision = Role::flattenAllChildren(function (Builder $builder) use ($role_id) {
            $builder->whereIn('id', $role_id)->get();
        });
        if ($filter) {
            $subdivision = collect($subdivision)->filter(function ($item) {
                return $item['user_id'] != Auth::id();
            });
        }
        return $subdivision;
    }
}
