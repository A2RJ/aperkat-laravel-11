<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property int $id
 * @property int|null $ppuf_id
 * @property int|null $role_id
 * @property int|null $iku1_id
 * @property int|null $iku2_id
 * @property int|null $iku3_id
 * @property string $background
 * @property string $speaker
 * @property string $participant
 * @property string $place
 * @property string $date
 * @property string $rundown
 * @property string $vendor
 * @property string $budget
 * @property string|null $approved_budget
 * @property string|null $report_file
 * @property int $is_disbursement_complete
 * @property int $is_done
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Iku1|null $iku1
 * @property-read \App\Models\Iku2|null $iku2
 * @property-read \App\Models\Iku3|null $iku3
 * @property-read \App\Models\Ppuf|null $ppuf
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SubmissionStatus> $status
 * @property-read int|null $status_count
 * @method static \Illuminate\Database\Eloquent\Builder|Submission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereApprovedBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereIku1Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereIku2Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereIku3Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereIsDisbursementComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereIsDone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereParticipant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission wherePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission wherePpufId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereReportFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereRundown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereSpeaker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission withoutTrashed()
 * @mixin \Eloquent
 */
class Submission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ppuf_id',
        'role_id',
        'iku1_id',
        'iku2_id',
        'iku3_id',
        'disbursement_period_id',
        'background',
        'speaker',
        'participant',
        'rundown',
        'place',
        'date',
        'vendor',
        'budget',
        'budget_detail',
        'approved_budget',
        'report_file',
        'is_disbursement_complete',
        'is_done'
    ];

    protected $casts = [
        'budget_detail' => 'array',
    ];

    protected function budget(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => money($value, 'IDR', true),
        );
    }

    public function ppuf()
    {
        return $this->belongsTo(Ppuf::class);
    }

    public function status()
    {
        return $this->hasMany(SubmissionStatus::class);
    }

    public function iku1()
    {
        return $this->belongsTo(Iku1::class);
    }

    public function iku2()
    {
        return $this->belongsTo(Iku2::class);
    }

    public function iku3()
    {
        return $this->belongsTo(Iku3::class);
    }

    public function period()
    {
        return $this->belongsTo(DisbursementPeriod::class, 'disbursement_period_id');
    }

    public function disbursements()
    {
        return $this->hasMany(Disbursement::class);
    }
}
