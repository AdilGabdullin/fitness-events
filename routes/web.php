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

Route::get('/admin', function () {
    return view('auth.login');
});
Route::get('/', 'FrontController@index')->name('front');
Route::get('/{page_url}', 'FrontController@getPage');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact-us', 'FrontController@contactUs');
Route::get('/add-event', 'FrontController@addEvent');
Route::get('/articles/all', 'FrontController@allArticles')->name('articles.all');

Route::get('/blog/{article_name}', 'FrontController@showBlog');
Route::get('/blog/{id}/{article_name}', 'FrontController@showBlogWithId');
Route::get('/article/{article_name}', 'FrontController@showArticle');
Route::get('/article/{id}/{article_name}', 'FrontController@showArticleWithId');

Route::get('/events', 'FrontController@allEvents')->name('allevents');
//Route::get('/events/search', 'FrontController@getallEvents')->name('getallevents');
Route::get('/events/filter/tags', 'FrontController@filterEvents');
Route::get('/event/{sport_tag}', 'FrontController@eventsBySportTag');
Route::get('/event/{sport_tag}/{event_name}', 'FrontController@singleEvent');

//Route::resource('/users', 'UserController');

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'roles'], 'roles'=>'Admin'], function () {
    Route::resource('/users', 'UserController');
    
    Route::get('/imports', 'ImportController@getImport')->name('import');
    Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
    Route::post('/import_process', 'ImportController@processImport')->name('import_process');
    Route::post('/blog_import_process', 'ImportController@processBlogImport')->name('blog_import_process');
    Route::post('/event_import_process', 'ImportController@processEventImport')->name('event_import_process');
    Route::get('/eventsupdate/{type?}', 'ImportController@eventsupdate');
    Route::get('/eventTagUpdate', 'ImportController@eventTagUpdate');
});

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'roles'], 'roles'=>['User','Editor', 'Admin']], function () {
    Route::resource('/blogs', 'BlogController');
    Route::resource('/tags', 'TagController');
    Route::resource('/medias', 'MediaController');
});

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'roles'], 'roles'=>['Editor', 'Admin']], function () {
    Route::resource('/events', 'EventController');
    Route::resource('/eventproviders', 'EventProviderController');
    Route::resource('/charities', 'CharityController');
    Route::resource('/pages', 'PageController');
    Route::get('/getCharities', 'EventController@getCharities');
});

