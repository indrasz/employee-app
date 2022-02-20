<?php

use App\Http\Livewire\Crud;
use App\Http\Livewire\EmployeeIndex;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::get('/pdf', [DashboardController::class, 'downloadPdf'])->name('download-pdf');
        Route::resource('employee', EmployeeController::class);
        Route::resource('employee.gallery', GalleryController::class)->only([
            'create', 'store'
        ]);
        Route::get('employees', EmployeeIndex::class)->name('employee-livewire');      
        Route::get('students', Crud::class);
    });
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
