<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
   // Route::get('register', [RegisteredUserController::class, 'create'])
     //           ->name('register');

    //Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name("login");

    Route::get('admin', [MyPage::class, "showPost"])
                ->name('superuser');
    //Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
      //          ->name('password.request');

    //Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
     //           ->name('password.email');

    //Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
      //          ->name('password.reset');

    //Route::post('reset-password', [NewPasswordController::class, 'store'])
      //          ->name('password.update');
});

Route::middleware('auth')->group(function () {


    Route::get('admin', [AdminController::class, 'redirect'])
    ->name('admin');

    Route::post('redactAbout', [AdminController::class, 'redactAbout'])
    ->name('redactAbout');

    Route::post('postTitleEdit', [AdminController::class, 'postTitleEdit'])
    ->name('postTitleEdit');

    Route::post('postContentEdit', [AdminController::class, 'postContentEdit'])
    ->name('postContentEdit');

    Route::post('addProduct', [AdminController::class, 'addProduct'])
    ->name('addProduct');
    
    Route::post('addService', [AdminController::class, 'addService'])
    ->name('addService');

    Route::post('addMarker', [AdminController::class, 'addMarker'])
    ->name('addMarker');

    Route::post('deleteMarker', [AdminController::class, 'deleteMarker'])
    ->name('deleteMarker');
    
    Route::post('redactMarker', [AdminController::class, 'redactMarker'])
    ->name('redactMarker');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
    
    Route::post('addPost', [AdminController::class, 'addPost'])
    ->name('addPost');

    Route::post('changeService', [AdminController::class, 'changeService'])
    ->name('changeService');
    Route::post('deleteService', [AdminController::class, 'deleteService'])
    ->name('deleteService');
});
