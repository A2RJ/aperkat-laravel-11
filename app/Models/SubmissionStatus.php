<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int|null $role_id
 * @property int|null $submission_id
 * @property int $status
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Role|null $role
 * @property-read \App\Models\Submission|null $submission
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SubmissionStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'submission_id',
        'role_id',
        'status',
        'message'
    ];

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
