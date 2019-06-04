<?php

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


Auth::routes();

Route::get('/', 'Controller@index')->name('home');
Route::get('/p', 'Controller@panel')->name('panel');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/subscribe', 'Controller@subscribe');

Route::prefix('services')->group(function(){
    Route::get('/', 'Controller@services');
  
});
Route::prefix('projects')->group(function(){
    Route::get('/', 'ProjectController@index');
  
});
Route::prefix('about-us')->group(function(){
    Route::get('/', 'Controller@about');
  
});
Route::get('/contact-us', 'Controller@contact');
Route::prefix('panel')->group(function(){
    Route::get('/', 'AdminController@index');

    Route::get('/get-slides', 'AdminController@getSlides');


    Route::post('/save-slide', 'AdminController@saveSlides');
  
 });