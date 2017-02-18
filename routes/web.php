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

Route::get('/', 'SongController@viewSongs');

Route::get('/manage-songs', 'SongController@viewManageSongs');

// Song-related
Route::post('/song', 'SongController@addSong');
Route::patch('/song', 'SongController@editSong');
Route::delete('/song', 'SongController@deleteSong');

// Events-related
Route::post('/event', 'EventController@addEvent');
Route::patch('/event', 'EventController@editEvent');
Route::delete('/event', 'EventController@deleteEvent');
