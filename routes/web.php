<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Ppuf\PpufController;
use App\Http\Controllers\Submission\DisbursementController;
use App\Http\Controllers\Submission\DisbursementPeriodController;
use App\Http\Controllers\Submission\SubDivisionController;
use App\Http\Controllers\Submission\SubmissionController;
use App\Http\Controllers\SuperAdmin\RoleController;
use App\Http\Controllers\SuperAdmin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::get('callback', 'callback');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
    Route::get('app-health', fn () => view('vendor.pulse.dashboard'))->name('app.health')->middleware('super-admin');
});

Route::middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'home')->name('home')->withoutMiddleware('auth');
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('user-dashboard', 'userDashboard')->name('user.dashboard');
        Route::get('period/{period}', 'period')->name('ppuf.period');
        Route::get('user-period/{period}', 'userPeriod')->name('user.period');
    });

    Route::resource('user', UserController::class)->except(['create', 'store'])->middleware('super-admin');
    Route::resource('role', RoleController::class)->except(['create',  'edit'])->middleware('super-admin');

    Route::prefix('ppuf')->controller(PpufController::class)->group(function () {
        Route::get('import', 'importForm')->name('ppuf.import');
        Route::post('preview', 'preview')->name('ppuf.preview');
        Route::post('import', 'import')->name('ppuf.post-import');
        Route::get('export', 'export')->name('ppuf.export');
    })->middleware('wr2');
    Route::resource('ppuf', PpufController::class)->only('index');
    Route::resource('ppuf', PpufController::class)->except('index', 'show')->middleware('wr2');

    Route::prefix('submission')->controller(SubDivisionController::class)->group(function () {
        Route::get('print/{submission}', 'print')->name('submission.print');
        Route::middleware('dir-keuangan')->group(function () {
            Route::get('direktur-keuangan', 'dirKeuangan')->name('submission.dir-keuangan');
            Route::post('period/{submission}', 'period')->name('submission.period');
        });
        Route::middleware('wr2')->group(function () {
            Route::get('warek-2', 'wr2')->name('submission.wr2');
            Route::post('warek-2-approve/{period}', 'wr2Approve')->name('submission.wr2.approve');
        });
        Route::post('action/{submission}', 'action')->name('submission.action');
        Route::get('donwload-lpj/{submission}', 'downloadLpj')->name('submission.download-lpj');
        Route::post('upload-lpj/{submission}', 'uploadLpj')->name('submission.upload-lpj')->middleware('user');
        Route::middleware('admin-lpj')->group(function () {
            Route::get('admin-lpj', 'adminLpj')->name('submission.admin-lpj');
            Route::post('aksi-lpj/{submission}', 'actionLpj')->name('submission.aksi-lpj');
        });
        Route::get('sub-division', 'index')->name('submission.sub-division');
    });
    Route::resource('pencairan', DisbursementController::class)->only('show');
    Route::resource('pencairan', DisbursementController::class)->except('show')->middleware('admin-pencairan');
    Route::resource('submission', SubmissionController::class);
    Route::resource('disbursement-period', DisbursementPeriodController::class)->except(['create', 'show',  'edit'])->middleware('dir-keuangan');
});
