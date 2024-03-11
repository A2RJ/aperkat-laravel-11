<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppuf extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'ppuf_number',
        'iku_1',
        'iku_2',
        'iku_3',
        'activity_type',
        'program_name',
        'description',
        'execution_location',
        'execution_time',
        'planned_expenditure',
        'detail',
    ];

    public function author()
    {
        return $this->belongsTo(Role::class);
    }
}
