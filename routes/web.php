<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Ppuf\PpufController;
use App\Http\Controllers\SuperAdmin\RoleController;
use App\Http\Controllers\SuperAdmin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::get('callback', 'callback');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'home')->name('home')->withoutMiddleware('auth');
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });

    Route::resource('user', UserController::class)->only('index');
    Route::resource('role', RoleController::class)->except(['create',  'edit']);

    Route::prefix('ppuf')->controller(PpufController::class)->group(function () {
        Route::get('import', 'importForm')->name('ppuf.import');
        Route::post('preview', 'preview')->name('ppuf.preview');
        Route::post('import', 'import')->name('ppuf.post-import');
        Route::get('export', 'export')->name('ppuf.export');
    });
    Route::resource('ppuf', PpufController::class)->except('show');
});

Route::get('test', function () {
    $jsonData = '[
    {
        "role_id": "DSTI",
        "ppuf_number": "001",
        "iku": "Test",
        "activity_type": "Pemeliharaan",
        "program_name": "Nama Program 3",
        "description": "Deskripsi",
        "location": "UTS",
        "date": "Maret",
        "planned_expenditure": 200000,
        "detail": ""
    },
    {
        "role_id": "DSTI",
        "ppuf_number": "1",
        "iku": "Test",
        "activity_type": "Program",
        "program_name": "Nama Program 1",
        "description": "Deskripsi",
        "location": "UTS",
        "date": "Januari",
        "planned_expenditure": 1000000,
        "detail": ""
    },
    {
        "role_id": "DSTI",
        "ppuf_number": "2",
        "iku": "Test",
        "activity_type": "Pengadaan",
        "program_name": "Nama Program 2",
        "description": "Deskripsi",
        "location": "UTS",
        "date": "Februari",
        "planned_expenditure": 1500000,
        "detail": ""
    },
    {
        "role_id": "DSTI",
        "ppuf_number": "001",
        "iku": "Test",
        "activity_type": "Pemeliharaan",
        "program_name": "Nama Program 3",
        "description": "Deskripsi",
        "location": "UTS",
        "date": "Maret",
        "planned_expenditure": 200000,
        "detail": ""
    }
]';

    // Decode JSON data into an array of objects
    $data = json_decode($jsonData);

    // Convert the array into a Laravel Collection
    $collection = collect($data);

    // Use the unique() method with a callback function to filter by ppuf_number
    $filteredCollection = $collection->uniqueStrict(function ($item) {
        return $item->ppuf_number;
    });

    // Convert the filtered collection back to JSON
    $filteredJsonData = $filteredCollection->toJson(JSON_PRETTY_PRINT);

    echo $filteredJsonData;
});
