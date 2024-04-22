<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $period
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Submission> $submissions
 * @property-read int|null $submissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|DisbursementPeriod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisbursementPeriod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisbursementPeriod query()
 * @method static \Illuminate\Database\Eloquent\Builder|DisbursementPeriod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisbursementPeriod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisbursementPeriod wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisbursementPeriod whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DisbursementPeriod extends Model
{
    use HasFactory;

    protected $fillable = ['period'];

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
