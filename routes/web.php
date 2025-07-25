<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WorkPlaceController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BorderController;
use App\Http\Controllers\FinishGoodScheduleController;
use App\Http\Controllers\GussetController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MattrasController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PocketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\WipScheduleController;

# auth
Route::get('/', [AuthenticationController::class, 'index'])->name('login');
Route::post('/login', [AuthenticationController::class, 'authenticate']);

# search
Route::get('/areas/search', [AreaController::class, 'search'])->name('areas.search');
Route::get('/departements/search', [DepartementController::class, 'search'])->name('departements.search');
Route::get('/divisions/search', [DivisionController::class, 'search'])->name('divisions.search');
Route::get('/brands/search', [BrandController::class, 'search'])->name('brands.search');
Route::get('/categories/search', [CategoryController::class, 'search'])->name('categories.search');
Route::get('/types/search', [TypeController::class, 'search'])->name('types.search');
Route::get('/locations/search', [LocationController::class, 'search'])->name('locations.search');
Route::get('/finish_good_schedules/search', [FinishGoodScheduleController::class, 'search'])->name('finish_good_schedules.search');
Route::get('/wip_schedules/search', [FinishGoodScheduleController::class, 'search'])->name('wip.search');

# page
Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/logout', [AuthenticationController::class, 'destroy'])->name('logout');

    Route::resources([
        'areas' => AreaController::class,
        'departements' => DepartementController::class,
        'divisions' => DivisionController::class,
        'work_places' => WorkPlaceController::class,
        'brands' => BrandController::class,
        'categories' => CategoryController::class,
        'types' => TypeController::class,
        'locations' => LocationController::class,
        'maintenances' => MaintenanceController::class,
        'profiles' => ProfileController::class,
        'operators' => OperatorController::class,
        'mattras' => MattrasController::class,
        'border' => BorderController::class,
        'gusset' => GussetController::class,
        'panel' => PanelController::class,
        'pocket' => PocketController::class,
        'ram' => RamController::class,
    ]);

    # profile
    Route::get('/profiles/{profile}/edit-info', [ProfileController::class, 'editInfo'])->name('profiles.edit.info');
    Route::get('/profiles/{profile}/edit-work', [ProfileController::class, 'editWork'])->name('profiles.edit.work');
    Route::put('/profiles/{profile}/work', [ProfileController::class, 'updateWorkExperience'])->name('profiles.update.work');
    Route::put('/profiles/{profile}/info', [ProfileController::class, 'updateUserInfo'])->name('profiles.update.info');
    Route::post('/profiles/image', [ProfileController::class, 'updateImage'])->name('profiles.update.image');
    Route::get('/profiles/{profile}/edit-password', [ProfileController::class, 'editPassword'])->name('profiles.edit.password');
    Route::put('/profiles/{profile}/change-password', [ProfileController::class, 'changePassword'])->name('profiles.change.password');

    # maintenance
    Route::get('/maintenances/{id}/specification', [MaintenanceController::class, 'specification'])->name('maintenances.specification');
    Route::post('/maintenances/{id}/specification', [MaintenanceController::class, 'createSpecification'])->name('maintenances.create.specification');
    Route::get('/maintenances/{id}/mutasi_asset/new', [MaintenanceController::class, 'assetMutation'])->name('maintenances.asset.mutation');
    Route::post('/maintenances/{id}/mutasi_asset/new', [MaintenanceController::class, 'storeMutation'])->name('maintenances.store.mutation');
    Route::get('/maintenances/{id}/mutasi_asset/edit', [MaintenanceController::class, 'editMutation'])->name('maintenances.edit.mutation');
    Route::put('/maintenances/{id}/mutasi_asset/edit', [MaintenanceController::class, 'updateMutation'])->name('maintenances.update.mutation');
    Route::get('/maintenances/{id}/qrcode', [MaintenanceController::class, 'showQrcode'])->name('maintenances.qrcode');
    Route::get('/maintenances/{id}/download-qrcode', [MaintenanceController::class, 'downloadQrCode'])->name('maintenances.download_qrcode');

    # finish good
    Route::resource('finish_good_schedules', FinishGoodScheduleController::class)->except(['destroy']);
    Route::post('/finish_good_schedules/import', [FinishGoodScheduleController::class, 'import'])->name('finish_good_schedules.import');
    Route::post('/finish_good_schedules/clear-all', [FinishGoodScheduleController::class, 'clearAll'])->name('finish_good_schedules.clearAll');
    Route::delete('/finish_good_schedules/delete-selected', [FinishGoodScheduleController::class, 'deleteSelected'])->name('finish_good_schedules.delete-selected');

    # wip schedule
    Route::resource('wip_schedules', WipScheduleController::class)->except(['destroy']);
    Route::post('/wip_schedules/import', [WipScheduleController::class, 'import'])->name('wip_schedules.import');
    Route::post('/wip_schedules/clear-all', [WipScheduleController::class, 'clearAll'])->name('wip_schedules.clearAll');
    Route::delete('/wip_schedules/delete-selected', [WipScheduleController::class, 'deleteSelected'])->name('wip_schedules.delete-selected');

    Route::patch('/operators/{operator}/complete', [MattrasController::class, 'markComplete'])->name('operators.markComplete');
    Route::patch('/operators/{operator}/pending', [MattrasController::class, 'markPending'])->name('operators.markPending');

    # operator
    Route::patch('/operators/{id}/mark-complete', [OperatorController::class, 'markComplete'])->name('operators.markComplete');
});
