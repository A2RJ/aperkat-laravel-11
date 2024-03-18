<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $iku
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 whereIku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Iku2 extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'iku2';
}
