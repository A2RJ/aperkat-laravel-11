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
        'iku',
        'activity_type',
        'program_name',
        'description',
        'location',
        'date',
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

    static $program_types = ['Program', 'Pengadaan', 'Pemeliharaan', 'Pengembangan'];

    static $activity_dates = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];

    public function author()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
