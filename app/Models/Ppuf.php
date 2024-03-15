<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ppuf extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'role_id',
        'ppuf_number',
        'iku',
        'activity_type',
        'program_name',
        'description',
        'place',
        'date',
        'budget',
        'detail',
    ];

    protected function budget(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => money($value, 'IDR', true),
        );
    }

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

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
