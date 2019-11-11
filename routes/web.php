<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('inner.dashboard.index');
})->name('dashboard')->middleware('auth');

Route::resource('institutions','InstitutionController')->middleware('auth');
Route::resource('courses','CourseController')->middleware('auth');
Route::resource('students','StudentController')->middleware('auth');
Route::resource('users','UserController')->middleware('auth');

Auth::routes();

Route::get('/', function() {
    return redirect()->route('dashboard');
});

Route::get('/home', 'HomeController@index')->name('home');
