<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
