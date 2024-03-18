<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $iku
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Iku1 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku1 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku1 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku1 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku1 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku1 whereIku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku1 whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Iku1 extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'iku1';
}
