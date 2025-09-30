<?php

use Illuminate\Support\Facades\{
    Auth,
    Route
};

use App\Http\Controllers\Auth\{
    LoginController,
    ResetPasswordController,
    ForgotPasswordController
};

use App\Http\Controllers\{
    UserController,
    AdminController,
    HomeController,
    ProductController,
    CategoryController,
    OrderController
};

use App\Models\Category;


Route::get('/', [HomeController::class,'homepage'])->name('home');
Route::get('/forgot-password', [ForgotPasswordController::class,'forgotPassword'])->name('auth.forgot-password');

Route::post('/forgot-password',[ForgotPasswordController::class,'sendPasswordResetLink'])->name('auth.send-password-link');

Route::get('/reset-password/{token}',[ResetPasswordController::class,'resetPassword'])->middleware('guest')->name('auth.password-reset');

Route::post('/reset-password',[ResetPasswordController::class, 'checkResetPassword'])->middleware('guest')->name('auth.update-password');

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile', [AdminController::class, 'updateAdminProfilePicture']);
    Route::get('/admin/users', [AdminController::class, 'users']);

});
Route::middleware(['auth', 'isUser'])->group(function() {
    Route::get('/user/dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::post('/user/profile', [UserController::class, 'updateUserProfilePicture']);

});

