<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::post('/home/get_images', 'SearchController@searchImage');

// Route::post('/search', 'SearchController@search')->name('search');

//Project        
Route::group(['prefix' => 'search', 'middleware' => ['auth']], function () {
    Route::get('/browser', 'SearchController@index')->name('browser');
    // Route::get('create', 'ProjectController@create');
    Route::post('/', 'SearchController@search')->name('search');
    Route::get('/sentence', 'SearchController@setSentence')->name('searchSentence');
    // Route::post('/searchImage', 'SearchController@searchImage')->name('searchImage');
    Route::post('/get_images', 'SearchController@searchImage');

    // Route::get('{id}/edit', 'ProjectController@edit');
    // Route::post('{id}/update', 'ProjectController@update');
    // Route::post('{id}/delete', 'ProjectController@delete');
});

     
Route::group(['prefix' => 'home', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('create', 'HomeController@create');
    Route::post('/', 'HomeController@store')->name('store');
    Route::get('{id}/edit', 'HomeController@edit');
    Route::post('{id}/update', 'HomeController@update')->name('update');
    Route::get('{id}/delete', 'HomeController@delete');
    Route::post('/get_word', 'SearchController@searchWord');
    Route::post('/get_image', 'SearchController@searchImage');
    

});




Route::group(['prefix' => 'cards', 'middleware' => ['auth']], function () {
    Route::get('create', 'CardsController@create');

});