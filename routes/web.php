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


Route::get('/get-materials', 'Controller@getMaterials');
Route::get('/get-faqs', 'Controller@getFaqs');
Route::get('/get-skills', 'Controller@getSkills');
Route::get('/get-shear-gauges', 'Controller@getShearTables');

Route::post('/save-valoration', 'Controller@saveValoration');

Route::prefix('services')->group(function(){
    Route::get('/', 'Controller@services');
    Route::get('/{section}', 'Controller@goService');
    Route::post('/send-forming', 'Controller@sendForming');
  
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

    Route::get('/get-cats/{key}', 'AdminController@getCats');

    Route::get('/get-slides', 'AdminController@getSlides');
    Route::post('/save-slide', 'AdminController@saveSlides');
    Route::post('/update-slide/{id}', 'AdminController@updateSlide');
    Route::post('/add-slides/{id}', 'AdminController@addSlides');
    Route::get('/delete-slide/{id}', 'AdminController@deleteSlide');

    Route::get('/get-projects', 'AdminController@getProjects');
    Route::post('/save-project', 'AdminController@saveProject');

    Route::get('/get-categories', 'AdminController@getCategories');
    Route::post('/save-cat', 'AdminController@saveCat');

    Route::post('/save-material', 'AdminController@saveMaterial');
    Route::get('/delete-material/{id}', 'AdminController@removeMaterial');
    Route::get('/delete-gauge/{id}', 'AdminController@removeGauge');
    Route::post('/update-material/{id}', 'AdminController@updateMaterial');

    Route::get('/get-finishes', 'AdminController@getFinishes');
    Route::post('/save-finish', 'AdminController@saveFinish');
    Route::get('/delete-finish/{id}', 'AdminController@deleteFinish');

    
    Route::post('/save-faq', 'AdminController@saveFaq');
    Route::get('/delete-faq/{id}', 'AdminController@deleteFaq');
    
    
    Route::post('/save-skill', 'AdminController@saveSkill');
    Route::get('/delete-skill/{id}', 'AdminController@deleteSkill');
    
    Route::get('/get-mills', 'AdminController@getMills');
    Route::post('/save-mill', 'AdminController@saveMill');
    Route::get('/delete-mill/{id}', 'AdminController@deleteMill');
  
 });

 Route::get('testing', 'Controller@testing');