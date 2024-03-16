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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Role::class, 'parent_id');
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
        return $this->parent()->with('ancestors');
    }

    public static function flattenAllChildren(Closure $queryCallback = null)
    {
        $query = self::query();
        $queryCallback($query);

        $data = $query->with('descendants', 'user:id,name')->get();
        return self::flattenRecursiveArray($data, 'descendants');
    }

    public static function flattenAllAncestors(Closure $queryCallback)
    {
        $query = self::query();
        $queryCallback($query);

        $data = $query->with(['ancestors'])->get();
        return self::flattenRecursiveArray($data, 'ancestors');
    }

    static function flattenRecursiveArray($array, $key)
    {
        $result = [];

        foreach ($array as $item) {
            $children = $item[$key] ?? [];
            unset($item[$key]);

            $result[] = $item;
            if (!empty($children)) {
                $result = array_merge($result, self::flattenRecursiveArray($children, $key));
            }
        }

        return $result;
    }
}
