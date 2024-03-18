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
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 whereIku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Iku3 extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'iku3';
}
