<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Authenticate;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InterviewController;
use App\Http\Controllers\Admin\HRInterviewController;


Route::get('/interview/form/{token}', [InterviewController::class, 'form'])->name('interview.form');
Route::post('/interview/submit/{token}', [InterviewController::class, 'submit'])->name('interview.submit');

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', function () {
    return view('frontend.companylist');
});

Route::get('/offer-list', function () {
    return view('frontend.offerlist');
});

Route::get('/role-summary', function () {
    return view('frontend.rolesummary');
})->name('role-summary');


Route::prefix('admin')->group(function () {

   Route::middleware(['guest'])->as('admin.')->group(function () {

        Route::view('/login', 'auth.login')->name('login');
        Route::view('/register', 'auth.register')->name('register');

        Route::controller(Authenticate::class)->group(function () {
            Route::post('/authenticate', 'adminAuthenticate')->name('authenticate');
            Route::post('/register/update', 'registerUpdate')->name('register.update');
        });
    });

    Route::middleware('admin')->group(function () {
         Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

           //category
          Route::prefix('category')->controller(CategoryController::class)->group(function () {
            Route::get('/list', 'view')->name('view.category');
            Route::post('/save', 'save')->name('save.category');
            Route::post('/delete', 'destroy')->name('delete.category');
        });

        // interview
            Route::prefix('interview')->controller(InterviewController::class)->group(function () {
                Route::get('/list', 'view')->name('view.interview');
                Route::post('/save', 'save')->name('save.interview');
                Route::post('/delete', 'destroy')->name('delete.interview');
            });

          // hr interview
          Route::prefix('hr')->controller(HRInterviewController::class)->group(function () {
            Route::get('/list', 'view')->name('admin.hr.view');
            Route::get('/show/{id}', 'show')->name('admin.hr.show');
        });

         Route::post('/user_logout', [Authenticate::class, 'user_logout'])->name('admin.user_logout');

   });
});