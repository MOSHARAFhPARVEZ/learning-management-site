<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstuctorController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TeacherApplyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// frontend part
Route::get('/', [UserController::class, 'Index'])->name('index');
// user dashboard
Route::get('/dashboard', function () {
    return view('frontend.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');
// user middleware part
Route::middleware('auth')->group(function () {
    // profile part
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::get('/user/profile/change', [UserController::class, 'UserProfileChange'])->name('user.profile.change');
    Route::post('/user/profile/update', [UserController::class, 'UserProfileUpdate'])->name('user.profile.update');
    // user logout part
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    // user change password part
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.password.change');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');
});

// New Teacher apply part
Route::get('/teacher/apply', [TeacherApplyController::class, 'TeacherApply'])->name('teacher.apply');
Route::post('/teacher/apply/store', [TeacherApplyController::class, 'TeacherApplyStore'])->name('teacher.apply.store');

// frontend part


require __DIR__.'/auth.php';

// all dashboard route part start
// All about admin
// admin login
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// ===== admin middleware part ========
route::middleware(['auth','roles:admin'])->group(function(){
// admin dashboard
Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
// logout
Route::get('/admin/logout', [AdminController::class, 'Adminlogout'])->name('admin.logout');
// admin profile
Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/password/change', [AdminController::class, 'AdminPasswordChange'])->name('admin.password.change');
// category part
Route::controller(CategoryController::class)->group(function(){
    Route::get('/index/category','IndexCategory')->name('index.category');
    Route::get('/create/category','CrateCategory')->name('create.category');
    Route::post('/store/category','StoreCategory')->name('store.category');
    Route::get('/edit/category/{id}','EditCategory')->name('edit.category');
    Route::post('/update/category/{id}','UpdateCategory')->name('update.category');
    Route::get('/destroy/category/{id}','DestroyCategory')->name('destroy.category');
});
// instuctor part
Route::controller(TeacherApplyController::class)->group(function(){
    Route::get('/apply/instuctor/index','IndexApply')->name('instuctor.index');
    Route::get('/add/instuctor/{id}','AddAsInstuctor')->name('add.instuctor');
    Route::post('/store/instuctor','StoreInstuctor')->name('store.instuctor');
    Route::get('/all/instuctor','AllInstuctor')->name('all.instuctor');
    // route for active and inactive instuctor
    Route::get('/inactive/instuctor/{id}','InactiveInstuctor')->name('inactive.instuctor');
    Route::get('/active/instuctor/{id}','ActiveInstuctor')->name('active.instuctor');
    // Route::get('/destroy/category/{id}','DestroyCategory')->name('destroy.category');
});
// sub category part
Route::resource('/subcategory', SubCategoryController::class);
});// end admin middleware part

// instuctor login
Route::get('/instuctor/login', [InstuctorController::class, 'InstuctorLogin'])->name('instuctor.login');


// instuctor middleware part
route::middleware(['auth','roles:instuctor'])->group(function(){
Route::get('/instuctor/dashboard', [InstuctorController::class, 'InstuctorDashboard'])->name('instuctor.dashboard');
// logout
Route::get('/instuctor/logout', [InstuctorController::class, 'Instuctorlogout'])->name('instuctor.logout');
// instuctor profile
Route::get('/instuctor/profile', [InstuctorController::class, 'InstuctorProfile'])->name('instuctor.profile');

Route::post('/instuctor/profile/store', [InstuctorController::class, 'InstuctorProfileStore'])->name('instuctor.profile.store');

Route::get('/instuctor/change/password', [InstuctorController::class, 'InstuctorChangePassword'])->name('instuctor.change.password');

Route::post('/instuctor/password/update', [InstuctorController::class, 'InstuctorPasswordUpdate'])->name('instuctor.password.update');

// instuctor part
Route::controller(CourseController::class)->group(function(){
    Route::get('/course/index','CourseIndex')->name('course.index');
    Route::get('/course/create','CourseCreate')->name('course.create');
    // Route::get('/destroy/category/{id}','DestroyCategory')->name('destroy.category');
});

});// end instuctor middleware part



// all dashboard route part end
