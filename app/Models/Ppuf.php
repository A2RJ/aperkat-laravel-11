<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property int $id
 * @property int|null $role_id
 * @property string $iku
 * @property string $ppuf_number
 * @property string $activity_type
 * @property string $program_name
 * @property string $description
 * @property string $place
 * @property string $date
 * @property-read string $budget
 * @property string|null $detail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Role|null $author
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Submission> $submissions
 * @property-read int|null $submissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereActivityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereIku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf wherePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf wherePpufNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereProgramName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf withoutTrashed()
 * @property string $period
 * @property-read mixed $budget_idr
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf wherePeriod($value)
 * @mixin \Eloquent
 */
class Ppuf extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'role_id',
        'ppuf_number',
        'iku',
        'activity_type',
        'program_name',
        'description',
        'place',
        'date',
        'period',
        'budget',
        'detail',
    ];

    protected $appends = ['budget_idr'];

    public function getBudgetIdrAttribute()
    {
        return money($this->budget, 'IDR', true);
    }

    protected function budget(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value,
        );
    }

    public static function iku()
    {
        return [
            'iku1' => DB::table('iku1')->get(),
            'iku2' => DB::table('iku2')->get(),
            'iku3' => DB::table('iku3')->get(),
        ];
    }

    static $program_types = ['program', 'pengadaan', 'pemeliharaan', 'pengembangan'];

    static $activity_dates = [
        'januari',
        'februari',
        'maret',
        'april',
        'mei',
        'juni',
        'juli',
        'agustus',
        'september',
        'oktober',
        'november',
        'desember'
    ];

    public function author()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
