<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Authenticate;
use App\Http\Controllers\Admin\CandidateController as AdminCandidateController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InterviewController;
use App\Http\Controllers\Admin\HRInterviewController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HRController;

//interview form routes
Route::get('/interview/form/{token}', [InterviewController::class, 'form'])->name('interview.form');
Route::post('/interview/submit/{token}', [InterviewController::class, 'submit'])->name('interview.submit');

//company list route
Route::get('/', [CompanyController::class, 'companyList']);

//company offer list route
Route::get('/offer-list/{company}', [CompanyController::class, 'offerList']);

//role summary route
Route::get('/role-summary/{id}', [CompanyController::class, 'roleSummary'])
    ->name('role-summary');

//personal data route
Route::post('/personal-data/save', [CandidateController::class, 'savePersonalData'])->name('personal.data.save');
Route::get('/personal-data/{job_post_id}', [CandidateController::class, 'create'])
    ->name('personal.data');

   //Final Select route
   Route::post('/hr/final-select/{id}', [HRController::class, 'finalSelect'])
    ->name('admin.hr.final-select');

Route::get('/new-joinee/{token}', [HRController::class, 'showForm']);
Route::post('/employee-save', [HRController::class, 'employeeSave']);

Route::get('/successful', function () {
    return view('frontend.successfulimage');
});


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
            Route::get('/ratings-view/{id}', 'ratingsView')->name('admin.hr.ratings-view');
            Route::get('/download/{id}', 'downloadPdf')->name('admin.hr.download');
        });

        // job
        Route::prefix('job')->controller(JobController::class)->group(function () {
            Route::get('/list', 'view')->name('admin.job.view');
            Route::post('/save', 'save')->name('admin.job.save');
            Route::post('/delete', 'destroy')->name('admin.job.delete');
        });

        // company
        Route::prefix('company')->controller(App\Http\Controllers\Admin\CompanyController::class)->group(function () {
            Route::get('/list', 'view')->name('admin.company.view');
            Route::post('/save', 'save')->name('admin.company.save');
            Route::post('/delete', 'destroy')->name('admin.company.delete');
        });

            //employee
            Route::prefix('employee')->controller(App\Http\Controllers\HRController::class)->group(function () {
                Route::get('/list', 'index')->name('admin.employee.index');
                Route::get('/show/{id}', 'show')->name('admin.employee.show');
                Route::get('/download/{id}', 'downloadPdf')->name('admin.employee.download');
            });

        //candidate details
        Route::get('/candidates', [AdminCandidateController::class, 'view'])->name('admin.candidates.index');
        Route::get('/candidate/{id}', [AdminCandidateController::class, 'show'])->name('admin.candidates.show');
        Route::get('/candidate/{id}/download', [AdminCandidateController::class, 'downloadPdf'])->name('admin.candidates.download');

         Route::post('/user_logout', [Authenticate::class, 'user_logout'])->name('admin.user_logout');

   });
});
