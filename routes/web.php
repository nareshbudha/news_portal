<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\AdvertisementController;

// Frontend Routes
Route::get('/', function () {
    return view('frontend.pages.home');
});
 // Additional Frontend Routes within Admin
 Route::get('/contactus', function () {
    return view('frontend.pages.contact-us');
});

Route::get('/education', function () {
    return view('frontend.news.education');
});

Route::get('/health', function () {
    return view('frontend.news.health');
});

Route::get('/international', function () {
    return view('frontend.news.international');
});

Route::get('/lifestyle', function () {
    return view('frontend.news.lifestyle');
});

Route::get('/poltics', function () {
    return view('frontend.news.poltics');
});

Route::get('/sports', function () {
    return view('frontend.news.sports');
});

Route::get('/economy', function () {
    return view('frontend.news.economy');
});

Route::get('/travel', function () {
    return view('frontend.news.travel');
});

Route::get('/detail', function () {
    return view('frontend.news.details.newsdetail');
});

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Panel Routes
Route::prefix('admin')->middleware('auth')->group(function () {

    // User Management Routes
    Route::controller(AdminController::class)->group(function () {
        Route::get('/all/user', 'allUser')->name('all.user');
        Route::get('/add/user', 'addUser')->name('add.user');
        Route::post('/store/user', 'storeUser')->name('store.user');
        Route::get('/edit/user/{id}', 'editUser')->name('edit.user');
        Route::post('/update/user/{id}', 'updateUser')->name('update.user');
        Route::get('/delete/user/{id}', 'deleteUser')->name('delete.user');
    });

    // Permission Routes
    Route::controller(PermissionController::class)->group(function () {
        Route::get('/all/permission', 'index')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'store')->name('store.permission');
        Route::get('/edit/permission/{id}', 'edit')->name('edit.permission');
        Route::post('/update/permission', 'update')->name('update.permission');
        Route::get('/delete/permission/{id}', 'destroy')->name('delete.permission');
    });

    // Role Routes
    Route::controller(PermissionController::class)->group(function () {
        Route::get('/all/role', 'allRoles')->name('all.role');
        Route::get('/add/role', 'AddRole')->name('add.role');
        Route::post('/store/role', 'storeRole')->name('store.role');
        Route::get('/edit/role/{id}', 'editRole')->name('edit.role');
        Route::post('/update/role', 'updateRole')->name('update.role');
        Route::get('/delete/role/{id}', 'destroyRole')->name('delete.role');
        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::post('/store/roles/permission', 'RolePermissionStore')->name('store.role.permission');
        Route::get('/edit/roles/permission/{id}', 'EditRolesPermission')->name('edit.roles.permission');
        Route::post('/update/roles/permission/{id}', 'UpdateRolesPermission')->name('update.roles.permission');
        Route::get('/delete/roles/permission/{id}', 'DeleteRolesPermission')->name('delete.roles.permission');
    });

    // Post Category Routes
    Route::controller(PostCategoryController::class)->group(function () {
        Route::get('/all/postcategory', 'index')->name('all.postcategory');
        Route::get('/add/postcategory', 'addPostCategory')->name('add.postcategory');
        Route::post('/store/postcategory', 'store')->name('store.postcategory');
        Route::get('/edit/postcategory/{id}', 'edit')->name('edit.postcategory');
        Route::post('/update/postcategory', 'update')->name('update.postcategory');
        Route::get('/delete/postcategory/{id}', 'destroy')->name('delete.postcategory');
    });

    // Post Routes
    Route::controller(PostController::class)->group(function () {
        Route::get('/all/post', 'index')->name('all.post');
        Route::get('/add/post', 'AddPost')->name('add.post');
        Route::post('/store/post', 'store')->name('store.post');
        Route::get('/edit/post/{id}', 'edit')->name('edit.post');
        Route::post('/update/post', 'update')->name('update.post');
        Route::get('/delete/post/{id}', 'destroy')->name('delete.post');
    });

    // Page Routes
    Route::controller(PageController::class)->group(function () {
        Route::get('/all/page', 'index')->name('all.page');
        Route::get('/add/page', 'AddPage')->name('add.page');
        Route::post('/store/page', 'store')->name('store.page');
        Route::get('/edit/page/{id}', 'edit')->name('edit.page');
        Route::post('/update/page', 'update')->name('update.page');
        Route::get('/delete/page/{id}', 'destroy')->name('delete.page');
    });

    // Site Setting Routes
    Route::controller(SiteSettingController::class)->group(function () {
        Route::get('/all/site/setting', 'index')->name('all.site.setting');
        Route::get('/add/site/setting', 'AddSiteSetting')->name('add.site.setting');
        Route::post('/store/site/setting', 'store')->name('store.site.setting');
        Route::get('/edit/site/setting/{id}', 'edit')->name('edit.site.setting');
        Route::post('/update/site/setting', 'update')->name('update.site.setting');
        Route::get('/delete/site/setting/{id}', 'destroy')->name('delete.site.setting');
    });

    // Form Routes
    Route::controller(FormController::class)->group(function () {
        Route::get('/all/form', 'index')->name('all.form');
        Route::get('/add/form', 'AddForm')->name('add.form');
        Route::post('/store/form', 'store')->name('store.form');
        Route::get('/edit/form/{id}', 'edit')->name('edit.form');
        Route::post('/update/form', 'update')->name('update.form');
        Route::get('/delete/form/{id}', 'destroy')->name('delete.form');
    });

    // Advertisement Routes
    Route::controller(AdvertisementController::class)->group(function () {
        Route::get('/advertisement', 'index')->name('advertisement');
        Route::get('/add/advertisement', 'AddAdvertisement')->name('add.advertisement');
        Route::post('/store/advertisement', 'store')->name('store.advertisement');
        Route::get('/edit/advertisement/{id}', 'edit')->name('edit.advertisement');
        Route::post('/update/advertisement', 'update')->name('update.advertisement');
        Route::get('/delete/advertisement/{id}', 'destroy')->name('delete.advertisement');
    });

   
    
});

// Authentication Routes
require __DIR__ . '/auth.php';
