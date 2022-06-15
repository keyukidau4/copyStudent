<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// loginページからアクセスする
Route::get('/', function () {
    return view('login');
});
// loginのルーター, adminとユーザが同じログインページ

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login-page', [UserController::class, 'loginPage'])->name('loginPage');


//もしadminのアカウントでしたら Dashboard(管理ページ)へアクセスします。

Route::prefix('admin/student')->group(function () {
    Route::get('dashboard', [UserController::class, 'adminDashboard'])->name('admin.student.dashboard');

    Route::get('create', [UserController::class, 'create'])->name('admin.student.create');

    Route::post('store', [UserController::class, 'store'])->name('admin.student.store');

    Route::get('information/{id}', [UserController::class, 'information'])->name('admin.student.info');

    Route::get('edit/{id}', [UserController::class, 'edit'])->name('admin.student.edit');

    Route::put('update/{id}', [UserController::class, 'update'])->name('admin.student.update');

    Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('admin.student.destroy');
});

//ルームルーター

Route::prefix('admin/room')->group(function () {
    Route::get('dashboard', [RoomController::class, 'index'])->name('admin.room.dashboard');

    Route::get('create', [RoomController::class, 'create'])->name('admin.room.create');

    Route::post('store', [RoomController::class, 'store'])->name('admin.room.store');

    Route::get('information/{id}', [RoomController::class, 'information'])->name('admin.room.information');

    Route::get('edit/{id}', [RoomController::class, 'edit'])->name('admin.room.edit');

    Route::put('update/{id}', [RoomController::class, 'update'])->name('admin.room.update');

    Route::delete('destroy/{id}', [RoomController::class, 'destroy'])->name('admin.room.destroy');
});

//もしユーザーのアカウントでしたら、ホームページへアクセスします。
Route::prefix('student')->group(function () {
    Route::get('home', [UserController::class, 'index'])->name('student.home');

    Route::get('profile', [UserController::class, 'profile'])->name('student.profile');

    Route::get('course-form', [UserController::class, 'courseForm'])->name('student.course');

    Route::post('course', [UserController::class, 'courseCreate'])->name('student.courseCreate');

    Route::get('update', [UserController::class, 'updateProfile'])->name('student.updateProfile');

    Route::post('update-form', [UserController::class, 'updateProfileHandle'])->name('student.updateProfileHandle');

    Route::get('member-list', [USerController::class, 'memberList'])->name('student.member');

    //2022/06/15
    Route::get('deletePage', [UserController::class, 'destroyPage'])->name('student.destroyPage');

    Route::get('deleteCourse/{id}', [UserController::class, 'destroyCourse'])->name('student.destroyCourse');
});

//ログアウトのルーター

Route::get('logout', [UserController::class, 'logout'])->name('logout');
