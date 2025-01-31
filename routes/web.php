<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\IdeaApprovalController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\Master\ApproverController;
use App\Http\Controllers\Master\CategoryController;
use App\Http\Controllers\Master\DepartmentController;
use App\Http\Controllers\Master\LevelController;
use App\Http\Controllers\Master\PermissionController;
use App\Http\Controllers\Master\PositionController;
use App\Http\Controllers\Master\RoleController;
use App\Http\Controllers\Master\SectionController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Master\IdeaCountsController;
use App\Http\Controllers\Mpdr\MpdrController;
use App\Http\Controllers\PreMpdr\PreMpdrController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::get('/create-symlink', function () {
    $target = storage_path('app/public'); // path ke folder storage/app/public
    $link = public_path('storage'); // path ke folder public/storage

    // Cek apakah symlink sudah ada
    if (!File::exists($link)) {
        // Buat symlink
        symlink($target, $link);
        return 'Symlink has been created.';
    }

    return 'Symlink already exists.';
});




Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile', [UserController::class, 'updateProfile'])->name('profile.updates');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('positions', PositionController::class);
    Route::resource('levels', LevelController::class);
    Route::resource('sections', SectionController::class);

    Route::post('/notifications/mark-as-read', [PermissionController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::post('/notifications/markAllAsRead', [PermissionController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
    Route::get('/notifications/count', function () {
        return response()->json(['count' => auth()->user()->unreadNotifications->count()]);
    })->name('notifications.count');
    Route::delete('/notifications/clear', [PermissionController::class, 'clearAll'])->name('notifications.clear');


    // =============================================================PRE MPDR=================================================================
    Route::get('/prempdr', [PreMpdrController::class, 'index'])->name('prempdr.index');
    Route::get('/prempdr/report', [PreMpdrController::class, 'report'])->name('prempdr.report');



    // =============================================================MPDR=================================================================
    Route::get('mpdr', [MpdrController::class, 'index'])->name('mpdr.index');
    Route::get('mpdr/report', [MpdrController::class, 'report'])->name('mpdr.reports');


    // =============================================================RS=================================================================

});


Route::group(['middleware' => ['role:super-admin|admin']], function() {

    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('roles.give-permissions');
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);

    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

});



require __DIR__.'/auth.php';
