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
Route::get('/get-finishes', 'Controller@getFinishes');
Route::get('/get-faqs', 'Controller@getFaqs');
Route::get('/get-skills', 'Controller@getSkills');
Route::get('/get-shear-gauges', 'Controller@getShearTables');
Route::get('/forming-materials', 'Controller@formingMaterials');

Route::post('/save-valoration', 'Controller@saveValoration');

Route::get('/get-news', 'NewsController@getNews');
Route::get('/like-new/{id}', 'NewsController@likeNew');
Route::post('/comment-new/{id}', 'NewsController@commentNew');
Route::get('/new/{id}', 'NewsController@getNew');

Route::post('/send-contact', 'Controller@sendContact');

Route::post('check-mail', 'NewsController@checkMail');

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
    Route::post('/update-project/{id}', 'AdminController@updateProject');
    Route::post('/update-cover', 'AdminController@updateCover');
    Route::post('/delete-pic', 'AdminController@deletePic');


    Route::post('/save-material', 'AdminController@saveMaterial');
    Route::get('/delete-material/{id}', 'AdminController@removeMaterial');
    Route::get('/delete-gauge/{id}', 'AdminController@removeGauge');
    Route::post('/update-material/{id}', 'AdminController@updateMaterial');
    Route::post('/update-gauge', 'AdminController@updateGauge');

    Route::get('/get-finishes', 'AdminController@getFinishes');
    Route::post('/save-finish', 'AdminController@saveFinish');
    Route::get('/delete-finish/{id}', 'AdminController@deleteFinish');
    Route::post('/update-finish/{id}', 'AdminController@updateFinish');
    Route::post('/add-type', 'AdminController@addType');
    Route::get('/delete-type/{id}', 'AdminController@deleteType');

    
    Route::post('/save-faq', 'AdminController@saveFaq');
    Route::get('/delete-faq/{id}', 'AdminController@deleteFaq');
    Route::post('/update-faq/{id}', 'AdminController@updateFaq');
    
    
    Route::post('/save-skill', 'AdminController@saveSkill');
    Route::get('/delete-skill/{id}', 'AdminController@deleteSkill');
    Route::post('/update-skill/{id}', 'AdminController@updateSkill');
    
    Route::get('/get-mills', 'AdminController@getMills');
    Route::post('/save-mill', 'AdminController@saveMill');
    Route::get('/delete-mill/{id}', 'AdminController@deleteMill');
    Route::post('/update-mill/{id}', 'AdminController@updateMill');
    Route::post('/add-mill-type', 'AdminController@addMillType');
    Route::get('/delete-mill-type/{id}', 'AdminController@deleteMillType');

    Route::get('/get-paints', 'AdminController@getPaints');
    Route::post('/save-paint', 'AdminController@addPaint');
    Route::post('/update-paint/{id}', 'AdminController@updatePaint');
    Route::post('/delete-paint', 'AdminController@deletePaint');

    Route::get('/delete-new/{id}', 'NewsController@deleteNew');
    Route::post('/update-new/{id}', 'NewsController@updateNew');
    Route::post('/add-new', 'NewsController@createNew');
    Route::get('/get-subs', 'NewsController@getSubs');

    Route::get('/unsuscribe/{id}', 'AdminController@unsuscribe');


    Route::get('/get-inbox', 'AdminController@getInbox');
    Route::get('/get-votes', 'AdminController@getVotes');

  
 });

 Route::get('testing', 'Controller@testing');