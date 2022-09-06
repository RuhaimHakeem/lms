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

 


// Route::get('/agentlogin', function (){
//     return view("agentlogin");
// });


Route::get('/adminlogin',[CustomAuthController::class,'loginadmin'])->name('loginadmin')->middleware('alreadyLoggedIn');

Route::get('/agentregister',[AdminController::class,'agentregister'])->name('agentregister')->middleware('isLoggedIn');

Route::get('/admindashboard',[AdminController::class,'admindashboard'])->name('admindashboard')->middleware('isLoggedIn');

Route::get('/admindashboard/viewleads',[AdminController::class,'viewleads'])->name('viewleads')->middleware('isLoggedIn');

Route::get('/admindashboard/leadupload',[AdminController::class,'leadupload'])->name('leadupload')->middleware('isLoggedIn');

Route::get('/logout',[AdminController::class,'logout'])->name('logout');

Route::post('uploadlead',[AdminController::class,'upload'])->name('uploadlead');

Route::post('recaptcha',[CustomAuthController::class,'recaptcha'])->name('recaptcha');



Route::post('adminlogin',[CustomAuthController::class,'adminLogin'])->name('adminlogin');


// Route::post('login-user',[CustomAuthController::class,'loginUser'])->name('login-user');



Route::post('email/verification',[CustomAuthController::class,'emailUser'])->name('email/verification');






Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');

Route::get('/dashboard',[CustomAuthController::class,'dashboard']);