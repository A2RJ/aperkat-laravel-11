<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int|null $submission_id
 * @property string $budget
 * @property string $filename
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Submission|null $submission
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement whereBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Disbursement extends Model
{
    use HasFactory;

    protected $fillable = ['submission_id', 'budget', 'filename'];

    public function submission()
    {
        return $this->belongsTo(Submission::class, 'submission_id');
    }
}
