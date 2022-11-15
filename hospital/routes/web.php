<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\emp;



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

// Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login','App\Http\Controllers\emp\LoginController@showLoginForm')->name('login');
Route::post('/login','App\Http\Controllers\emp\LoginController@login')->name('login');
Route::post('/logout','App\Http\Controllers\emp\LoginController@logout')->name('logout');
Route::get('/register','App\Http\Controllers\emp\RegisterController@showRegistrationForm')->name('register');
Route::post('/register','App\Http\Controllers\emp\RegisterController@register')->name('register');
Route::post('/password/email','App\Http\Controllers\emp\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset','App\Http\Controllers\emp\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/reset','App\Http\Controllers\emp\ResetPasswordController@reset')->name('password.update');
Route::get('/password/reset/{token}','App\Http\Controllers\emp\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('/password/confirm','App\Http\Controllers\emp\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('/password/confirm','App\Http\Controllers\emp\ConfirmPasswordController@confirm')->name(' password.confirm');



