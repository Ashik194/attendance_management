<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RoleController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::controller(AdminController::class)->name('admin.')->group(function (){
        Route::get('logout', 'destroy')->name('logout');
        Route::get('profile-info/{id}', 'profile')->name('profile');
        Route::put('profile-info/{id}', 'update')->name('profile_update');
        Route::get('password-change/{id}', 'password_change')->name('password');
        Route::put('password-change/{id}', 'password_update')->name('password_update');
        //=========User Route==========//
        Route::get('user', 'index')->name('user');
        Route::get('user-create', 'create')->name('user_create');
        Route::post('user-create', 'store')->name('user_store');
        Route::get('user-edit/{id}', 'user_edit')->name('user_edit');
        Route::put('user-edit/{id}', 'user_update')->name('user_update');
        Route::get('user-delete/{id}', 'user_destroy')->name('user_delete');
    });
    //==================Employeee Attendance==================//
    Route::controller(AttendanceController::class)->prefix('attendance')->name('attendance.')->group(function (){
        Route::get('employee/attendance','index')->name('list');
        Route::get('employee/attendance/date','attendance_date')->name('attendance');
        Route::get('employee/attendance/create','create')->name('create');
        Route::post('employee/attendance/store','store')->name('store');
        Route::patch('employee/attendance/memo/update/{id}','memo_update')->name('memo_update');
        Route::get('employee/attendance/delete/{id}','destroy')->name('delete');
    });
    Route::controller(RoleController::class)->prefix('role')->name('role.')->group(function (){
        Route::get('permission', 'index')->name('permission');
        Route::get('permission-create', 'create')->name('permission_create');
        Route::post('permission-create', 'store')->name('permission_store');
        Route::get('permission-edit/{id}', 'edit')->name('permission_edit');
        Route::put('permission-edit/{id}', 'update')->name('permission_update');
        Route::get('permission-delete/{id}', 'destroy')->name('permission_delete');
        Route::get('role', 'role_index')->name('role');
        Route::get('role-create', 'role_create')->name('role_create');
        Route::post('role-create', 'role_store')->name('role_store');
        Route::get('role-edit/{id}', 'role_edit')->name('role_edit');
        Route::put('role-edit/{id}', 'role_update')->name('role_update');
        Route::get('role-delete/{id}', 'role_destroy')->name('role_delete');
        Route::get('role-permission', 'role_permission_index')->name('role_permission');
        Route::get('role-permission-create', 'role_permission_create')->name('role_permission_create');
        Route::post('role-permission-create', 'role_permission_store')->name('role_permission_store');
        Route::get('role-permission-edit/{id}', 'role_permission_edit')->name('role_permission_edit');
        Route::put('role-permission-edit/{id}', 'role_permission_update')->name('role_permission_update');
        Route::get('role-permission-delete/{id}', 'role_permission_destroy')->name('role_permission_delete');
    });

});

require __DIR__.'/auth.php';
