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

// # Login  -- #
Route::get('/', 'HomeController@index');

Route::get('/login', array('as' => 'login','uses' => 'Auth\LoginController@getLogin'));

Route::post('/login', 'Auth\LoginController@postLogin');

// # Logout  -- #

Route::get('/logout', array('as' => 'logout','uses' => 'Auth\LoginController@logout'));

Route::get('/home', 'HomeController@index')->name('home');

// # Songs  -- #

Route::get('/songs', 'SongController@getSongs');

Route::get('/songs/data', 'SongController@getSongsData')->name('song.data');

Route::get('/songs/add', 'SongController@getAddSongs');

Route::post('/songs/add', 'SongController@postAddSongs');

Route::get('/songs/update/{song_id}', 'SongController@getUpdateSongs');

Route::post('/songs/update', 'SongController@postUpdateSongs');

Route::get('/songs/delete/{song_id}', 'SongController@postDeleteSongs');
