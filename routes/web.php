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

// Route::get('/agentlogin', function (){
//     return view("agentlogin");
// });
Route::get('/',[CustomAuthController::class,'index'])->name('index')->middleware('alreadyLoggedIn');

Route::get('/email',[CustomAuthController::class,'email'])->name('email');

Route::get('/assignleads',[AdminController::class,'assignleads'])->name('assignleads')->middleware('isLoggedIn');;

Route::post('/assignleads',[AdminController::class,'leadassign'])->name('leadassign');

Route::get('/updatelead/{id}',[AdminController::class,'editlead'])->name('editlead')->middleware('isLoggedIn');;

Route::get('/updateagent/{id}',[AdminController::class,'editagent'])->name('editagent')->middleware('isLoggedIn');;

Route::post('/updateagent/{id}',[AdminController::class,'updateagent'])->name('updateagent');

Route::delete('/deletelead/{id}', [AdminController::class, 'deletelead'])->name('deletelead');

Route::delete('/deleteagent/{id}',[AdminController::class,'deleteagent'])->name('deleteagent');



Route::post('/updatelead/{id}',[AdminController::class,'updatelead'])->name('updatelead');

Route::get('/adminlogin',[CustomAuthController::class,'loginadmin'])->name('loginadmin')->middleware('alreadyLoggedIn');

Route::get('/agentregister',[CustomAuthController::class,'agentregister'])->name('agentregister')->middleware('isLoggedIn');

Route::get('/admindashboard',[AdminController::class,'admindashboard'])->name('admindashboard')->middleware('isLoggedIn');


Route::get('/admindashboard/viewleads',[AdminController::class,'viewleads'])->name('viewleads')->middleware('isLoggedIn');

Route::get('/admindashboard/viewagents',[AdminController::class,'viewagents'])->name('viewagents')->middleware('isLoggedIn');

Route::get('/admindashboard/agentsummary',[AdminController::class,'agentsummary'])->name('agentsummary')->middleware('isLoggedIn');

Route::get('/admindashboard/leadsummary',[AdminController::class,'leadsummary'])->name('leadsummary')->middleware('isLoggedIn');

Route::post('search', [AdminController::class,'search'])->name('search');

Route::get('/admindashboard/leadupload',[AdminController::class,'leadupload'])->name('leadupload')->middleware('isLoggedIn');

Route::post('/logout',[AdminController::class,'logout'])->name('logout');

Route::post('uploadlead',[AdminController::class,'upload'])->name('uploadlead');

Route::post('recaptcha',[CustomAuthController::class,'recaptcha'])->name('recaptcha');

Route::get('/viewlead/{id}',[AdminController::class,'viewlead'])->name('viewlead')->middleware('isLoggedIn');



Route::post('adminlogin',[CustomAuthController::class,'adminLogin'])->name('adminlogin');


// Route::post('login-user',[CustomAuthController::class,'loginUser'])->name('login-user');



Route::post('email/verification',[CustomAuthController::class,'emailUser'])->name('email/verification');






Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');

//Route::get('/dashboard',[CustomAuthController::class,'dashboard']);

Route::post('api/fetch-states', [AdminController::class, 'fetchState']);
Route::post('api/fetch-cities', [AdminController::class, 'fetchCity']);