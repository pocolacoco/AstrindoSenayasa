<?php

// use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.check_login');



// Register Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/register/admin', [AuthController::class, 'showRegistrationAdmin'])->name('registeradmin');
Route::post('/register/admin', [AuthController::class, 'register']);

//Role Routes
Route::get('/role', [AuthController::class, 'role'])->name('role');

//Route Dashboard
Route::middleware('auth')->group(function () {
Route::get('/dashboard', [Controller::class, 'dashboardadmin'])->name('dashboardadmin');
Route::get('/dashboardmahasiswa', [Controller::class, 'dashboardmahasiswa'])->name('dashboardmahasiswa');

});
Route::get('/totalmahasiswa', [Controller::class, 'index'])->name('index');

Route::get('/user', [Controller::class, 'user'])->name('user');
Route::get('/detailuser/{id}', [Controller::class, 'detailuser'])->name('detailuser');

Route::get('/user/{id}/edit', [Controller::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [Controller::class, 'update'])->name('user.update');

Route::get('/deleteuser/{id}', [Controller::class, 'deleteuser'])->name('deleteuser');
Route::get('/', [Controller::class, 'Home'])->name('Home');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/tambahuser', [Controller::class, 'tambahuser'])->name('tambahuser');
Route::post('/adduser', [Controller::class, 'addUser'])->name('adduser');



Route::get('/mahasiswa', [Controller::class, 'mahasiswa'])->name('lmahasiswa');
Route::get('/detailmahasiswa/{id}', [Controller::class, 'detailmahasiswa'])->name('detailmahasiswa');



Route::get('/kampus', [Controller::class, 'kampus'])->name('kampus');
Route::post('/kampus', [Controller::class, 'store'])->name('store');
Route::get('/detailkampus', [Controller::class, 'detailkampus'])->name('detailkampus');



Route::get('/kampus/{id}/edit', [Controller::class, 'editkampus'])->name('editkampus');
Route::post('/kampus/{id}', [Controller::class, 'updatekampus'])->name('updatekampus');
Route::get('/kampus/{id}', [Controller::class, 'destroykampus'])->name('destroykampus');


Route::get('/programstudi', [Controller::class, 'programstudi'])->name('programstudi');


Route::get('/programstudi/{id}/edit', [Controller::class, 'editprogramstudi'])->name('editprogramstudi');
Route::put('/programstudi/{id}', [Controller::class, 'updateprogramstudi'])->name('updateprogramstudi');

Route::post('/programstudi', [Controller::class, 'storeprogramstudi'])->name('storeprogramstudi');
Route::get('/program-studi/destroy/{id}', [Controller::class, 'destroyprogramstudi'])->name('destroyprogramstudi');



Route::get('/upload-form', [Controller::class, 'formmahasiswa'])->name('upload.form');
Route::post('/upload', [Controller::class, 'uploadformmahasiswa'])->name('upload.submit');
