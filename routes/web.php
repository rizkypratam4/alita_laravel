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
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeController;

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
    ]);

    Route::get('/profiles/{profile}/edit-info', [ProfileController::class, 'editInfo'])->name('profiles.edit.info');
    Route::get('/profiles/{profile}/edit-work', [ProfileController::class, 'editWork'])->name('profiles.edit.work');
    Route::put('/profiles/{profile}/work', [ProfileController::class, 'updateWorkExperience'])->name('profiles.update.work');
    Route::put('/profiles/{profile}/info', [ProfileController::class, 'updateUserInfo'])->name('profiles.update.info');

});
