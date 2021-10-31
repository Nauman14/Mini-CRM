<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LogoutController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function (){

    Route::get('/company/create',[CompanyController::class, 'create'])->name('company.create');
    Route::get('/company/{company}/view',[CompanyController::class, 'show'])->name('company.show');
    Route::get('/company',[CompanyController::class, 'index'])->name('company.index');
    Route::post('/company',[CompanyController::class, 'store'])->name('company.store');
    Route::get('/company/{company}/edit',[CompanyController::class, 'edit'])->name('company.edit');
    Route::patch('/company/{company}/update',[CompanyController::class, 'update'])->name('company.update');
    Route::delete('/company/{company}/destroy',[CompanyController::class, 'destroy'])->name('company.destroy');

    Route::get('/employee/create',[EmployeeController::class, 'create'])->name('employee.create');
    Route::get('/employee/{employee}/view',[EmployeeController::class, 'show'])->name('employee.show');
    Route::get('/employee',[EmployeeController::class, 'index'])->name('employee.index');
    Route::post('/employee',[EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/{employee}/edit',[EmployeeController::class, 'edit'])->name('employee.edit');
    Route::patch('/employee/{employee}/update',[EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employee/{employee}/destroy',[EmployeeController::class, 'destroy'])->name('employee.destroy');

    Route::get('/logout',[LogoutController::class, 'logout'])->name('logout');
});
