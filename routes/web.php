<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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
    return view('index');
});



Route::get('/email', function () {
    return view('email');
});

Route::get('/agentregister', function () {
    return view('agentregister');
}); 

Route::get('/adminlogin', function () {
    return view('adminlogin');
}); 

Route::get('/dashboardnew', function () {
    return view('dashboardnew');
}); 


Route::get('/agentlogin',[CustomAuthController::class,'agentlogin']);

Route::post('adminlogin',[CustomAuthController::class,'adminLogin'])->name('adminlogin');


Route::post('agentlogin',[CustomAuthController::class,'adminUser'])->name('agentlogin');

Route::post('login-user',[CustomAuthController::class,'loginUser'])->name('login-user');



Route::post('email/verification',[CustomAuthController::class,'emailUser'])->name('email/verification');






Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');

Route::get('/dashboard',[CustomAuthController::class,'dashboard']);