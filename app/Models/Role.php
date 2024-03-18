<?php

namespace App\Models;

use Closure;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property int $id
 * @property string $role
 * @property string $parent_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Role> $children
 * @property-read int|null $children_count
 * @property-read Role|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ppuf> $ppuf
 * @property-read int|null $ppuf_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Role withoutTrashed()
 * @mixin \Eloquent
 */
class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['role', 'parent_id', 'user_id'];

    public function ppuf()
    {
        return $this->hasMany(Ppuf::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->hasOne(Role::class, 'id', 'parent_id');
    }


    public function children()
    {
        return $this->hasMany(Role::class, 'parent_id');
    }

    public function descendants()
    {
        return $this->children()->with('descendants', 'user:id,name');
    }

    public function ancestors()
    {
        return $this->parent()->with('ancestors', 'user:id,name');
    }

    public static function flattenAllChildren(Closure $queryCallback = null)
    {
        $query = self::query();
        $queryCallback($query);

        $data = $query->with('descendants', 'user:id,name')->get();
        return self::flattenRecursiveDescendants($data, 'descendants');
    }

    static function flattenRecursiveDescendants($array, $key)
    {
        $result = [];

        foreach ($array as $item) {
            $children = $item[$key] ?? [];
            unset($item[$key]);

            $result[] = $item;
            if (!empty($children)) {
                $result = array_merge($result, self::flattenRecursiveDescendants($children, $key));
            }
        }

        return $result;
    }

    public static function flattenAllParents(Closure $queryCallback)
    {
        $query = self::query();
        $queryCallback($query);

        $data = $query->with('ancestors', 'user:id,name')->get();
        return self::flattenRecursiveAncestor($data->toArray()[0], 'ancestors');
    }

    static function flattenRecursiveAncestor($item, $key)
    {
        $result = [];

        $children = $item[$key] ?? [];
        data_forget($item, $key);

        $result[] = $item;
        if ($children) {
            $result = array_merge($result, self::flattenRecursiveAncestor($children, $key));
        }

        return $result;
    }
}
