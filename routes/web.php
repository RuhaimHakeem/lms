<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AdminController;

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
    return view('authentications.index');
});



Route::get('/email', function () {
    return view('authentications.email');
});

Route::get('/agentregister', function () {
    return view('authentications.agentregister');
}); 

Route::get('/adminlogin', function () {
    return view('authentications.adminlogin');
}); 

Route::get('/admindashboard', function () {
    return view('admin.admindashboard');
}); 

Route::get('/agentlogin', function (){
    return view("agentlogin");
});



Route::get('/admindashboard/leadupload',[AdminController::class,'leadupload'])->name('leadupload');

Route::post('uploadlead',[AdminController::class,'upload'])->name('uploadlead');



Route::post('adminlogin',[CustomAuthController::class,'adminLogin'])->name('adminlogin');


Route::post('agentlogin',[CustomAuthController::class,'adminUser'])->name('agentlogin');

Route::post('login-user',[CustomAuthController::class,'loginUser'])->name('login-user');



Route::post('email/verification',[CustomAuthController::class,'emailUser'])->name('email/verification');






Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');

Route::get('/dashboard',[CustomAuthController::class,'dashboard']);