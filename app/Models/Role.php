<?php

namespace App\Models;

use Closure;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public static function flattenAllAncestors(Closure $queryCallback)
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
