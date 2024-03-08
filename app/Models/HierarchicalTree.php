<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int|null $parent_user_id
 * @property int $parent_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, HierarchicalTree> $children
 * @property-read int|null $children_count
 * @property-read HierarchicalTree|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree query()
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree whereParentUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree whereParentUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree whereUpdatedAt($value)
 * @mixin \Barryvdh\LaravelIdeHelper\Eloquent
 * @mixin Eloquent
 */
class HierarchicalTree extends Model
{
    use HasFactory;

    protected $fillable = ['parent_user', 'parent_user_id'];

    public function transformArray(array $input)
    {
        $output = [];

        $previousId = null;
        foreach ($input as $id) {
            $output[] = [
                'parent_user_id' => $previousId,
                'parent_user' => $id,
            ];
            $previousId = $id;
        }

        return $output;
    }

    public function parent()
    {
        return $this->belongsTo(HierarchicalTree::class, 'parent_user_id', 'parent_user');
    }


    public function children()
    {
        return $this->hasMany(HierarchicalTree::class, 'parent_user_id', 'parent_user');
    }

    public function descendants()
    {
        return $this->children()->with('descendants');
    }

    public function ancestors()
    {
        return $this->parent()->with('ancestors');
    }

    /**
     * $data = HierarchicalTree::flattenAllChildren(function (Builder $query) {
     * $query->where('parent_user', 1);
     * });
     */
    public static function flattenAllChildren(Closure $queryCallback = null)
    {
        $query = self::query();
        $queryCallback($query);

        $data = $query->with('descendants')->get();
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
