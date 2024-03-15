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
        'background',
        'speaker',
        'participant',
        'place',
        'date',
        'rundown',
        'vendor',
        'budget'
    ];

    public function ppuf()
    {
        return $this->belongsTo(Ppuf::class);
    }
}
