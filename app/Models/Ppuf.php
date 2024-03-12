<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppuf extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'ppuf_number',
        'iku1_id',
        'iku2_id',
        'iku3_id',
        'activity_type',
        'program_name',
        'description',
        'execution_location',
        'execution_time',
        'planned_expenditure',
        'detail',
    ];

    public static function iku()
    {
        return [
            'iku1' => DB::table('iku1')->get(),
            'iku2' => DB::table('iku2')->get(),
            'iku3' => DB::table('iku3')->get(),
        ];
    }

    static $program_types = ['program', 'pengadaan', 'perawatan', 'pengembangan'];

    static $activity_dates = ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];

    public function author()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
