<?php

use backend\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/logout', function(){
   auth()->logout();
  return redirect('/login');
})->name('logout');

Route::get('/about-us', function(){
  return view('website.about_us');
})->name('about_us');

// auth user routes

Route::get('dashboard', 'backend\HomeController@index')->name('dashboard');
Route::get('home', 'backend\HomeController@index')->name('home');
Route::get('supper_admin_dashboard', 'backend\HomeController@index')->name('supper_admin_dashboard');

// new routes starts here
Auth::routes();

Route::get('/', 'HomeController@index')->name('home_page');
Route::get('/services', 'HomeController@index')->name('services');

Route::resources([
	'users' => UserController::class,
]);

Route::post('/general_delete', 'front\HomeController@general_delete')->name('general_delete');









Route::get('profile', 'HomeController@profile')->name('supper_admin.profile');
Route::post('profile', 'HomeController@updateProfile')->name('save.profile');
Route::post('/change_status', 'front\HomeController@change_status')->name('change_status');
