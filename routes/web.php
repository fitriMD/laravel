<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\SummaryController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login2');
})->name('login');

Route::get('/register', function () {
    return view('auth.register2');
});
Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('postLogin');
route::post('/simpanregistrasi',[RegisController::class,'simpanregistrasi'])->name('simpanregistrasi');
route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('daftarEmployee', EmployeeController::class);
    Route::resource('summary', SummaryController::class);
    Route::get('/createEmployee', [EmployeeController::class, 'create']);
    Route::post('createemployee', [EmployeeController::class, 'store'])->name('employee.create');
    Route::get('employee/update/{id}', [EmployeeController::class, 'edit']);
    Route::post('/employee-update/{id}', [EmployeeController::class, 'update']);
    Route::get('employee/hapus/{id}', [EmployeeController::class, 'destroy']);
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
