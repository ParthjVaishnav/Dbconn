<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Studentcontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OtpController;

Route::get('/', function () {
    return view('welcome');
});


Route::post('show', [Studentcontroller::class, 'getinfo'])->name('show');
Route::get('show-data', [Studentcontroller::class, 'showData']);
Route::get('delete/{id}', [Studentcontroller::class, 'delete'])->name("delete-student");
Route::get('edit/{id}', [Studentcontroller::class, 'edit'])->name("edit");
Route::put('edit-student/{id}', [Studentcontroller::class, 'editStudent']);
Route::get('search', [Studentcontroller::class, 'search']);
Route::post('mltdlt', [Studentcontroller::class, 'muldlt']);
Route::post('send-test-mail', [Studentcontroller::class, 'sendTestMail']);


Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

Route::view('addData', 'add-data');
Route::post('adddata', [AuthController::class, 'addData']);
// Route::get('add-data', [Studentcontroller::class, 'add-data'])->name('add-data');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::post('/send-otp', [OtpController::class, 'sendOtp']);
Route::post('/verify-otp', [OtpController::class, 'verifyOtp']);
