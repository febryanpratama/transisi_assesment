<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\Select2Controller;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/companies', CompaniesController::class);
Route::resource('/employees', EmployeesController::class);

Route::post('pdf/companies', [CompaniesController::class, 'pdf']);

Route::get('dataforselect2', [Select2Controller::class, 'getdataforselect2'])->name('dataforselect2');

Route::get('import', [ImportController::class,'importform']);
Route::post('import', [ImportController::class,'import']);
