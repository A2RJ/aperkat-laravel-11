<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disbursement extends Model
{
    use HasFactory;

    protected $fillable = ['submission_id', 'budget', 'filename'];

    public function submission()
    {
        return $this->belongsTo(Submission::class, 'submission_id');
    }
}
