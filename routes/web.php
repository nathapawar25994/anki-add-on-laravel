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
    return redirect('home');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::post('/home/get_images', 'SearchController@searchImage');

// Route::post('/search', 'SearchController@search')->name('search');

//Project        
Route::group(['prefix' => 'search', 'middleware' => ['auth']], function () {
    Route::get('/browser', 'SearchController@index')->name('browser');
    Route::get('/get_images_from_browser', 'SearchController@GetImagesfromBrowser')->name('get_images_from_browser');

    // Route::get('create', 'ProjectController@create');
    Route::post('/', 'SearchController@search')->name('search');
    Route::get('/sentence', 'SearchController@setSentence')->name('searchSentence');
    // Route::post('/searchImage', 'SearchController@searchImage')->name('searchImage');
    // Route::post('/get_images', 'SearchController@searchImage');
    Route::post('/get_images', 'SearchController@searchImage')->name('get_img');

    // Route::get('{id}/edit', 'ProjectController@edit');
    // Route::post('{id}/update', 'ProjectController@update');
    // Route::post('{id}/delete', 'ProjectController@delete');
});

Route::get('/word/{term}', 'SearchController@getImagesLInks');
Route::get('/word_dict/{term}', 'SearchController@getDetailsFromDict');

Route::group(['prefix' => 'home','middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('create', 'HomeController@create');
    Route::post('/', 'HomeController@store')->name('store_deck');
    Route::get('{id}/edit', 'HomeController@edit');
    Route::post('{id}/update', 'HomeController@update')->name('update');
    Route::get('{id}/delete', 'HomeController@delete');
    Route::post('/get_details_of_word', 'SearchController@searchAllDetails');
    Route::post('/get_sound', 'SearchController@getSound');
    Route::post('/get_conjugate', 'SearchController@getConjugate');
    Route::post('/get_word', 'SearchController@searchWord');
    Route::post('/get_PronCodes', 'SearchController@getPronCodes');
    Route::post('/get_POS', 'SearchController@getPOS');
    Route::post('/get_GRAM', 'SearchController@getGRAM');
    Route::post('/update_count', 'HomeController@updateCount');
    Route::post('/get_images', 'SearchController@searchImage');
    Route::post('/get_fields', 'HomeController@getFields');
    Route::get('add', 'HomeController@add')->name('Add');
    Route::post('/add', 'HomeController@storeFieldForm')->name('store_addField_form');
    Route::post('/upload_audio_file', 'HomeController@uploadRecordingFile')->name('upload_audio_file');
    Route::get('{id}/study', 'HomeController@startStudy');
    Route::get('{id}/start', 'HomeController@startStudyFromCardType');
});


Route::get('/dropzone','ImageController@index');
Route::post('/dropzone/store','ImageController@store')->name('dropzone.store');



Route::group(['prefix' => 'cards', 'middleware' => ['auth']], function () {
    Route::get('/', 'CardsController@index')->name('cards_index');
    Route::get('{id}/show', 'CardsController@show')->name('show_card');
    Route::get('create', 'CardsController@create')->name('create_cards');
    Route::post('/', 'CardsController@store')->name('store_card');
    Route::post('/get_fields', 'HomeController@getFields');
});


//Holidays
Route::group(['prefix' => 'fields', 'middleware' => ['auth']], function () {
    Route::get('/', 'FieldsController@index')->name('field_list');
    Route::get('create', 'FieldsController@create');
    Route::post('/', 'FieldsController@store')->name('store_fields');
    Route::get('{id}/edit', 'FieldsController@edit');
    Route::post('{id}/update', 'FieldsController@update');
    Route::get('{id}/delete', 'FieldsController@delete');
});

