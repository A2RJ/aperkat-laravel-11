<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ppuf_id',
        'iku1_id',
        'iku2_id',
        'iku3_id',
        'background',
        'speaker',
        'participant',
        'rundown',
        'place',
        'date',
        'budget',
        'vendor',
    ];

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
}
