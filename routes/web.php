<?php

use App\Announcement;
use App\Deploy;
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


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/admin', function () {
//     return view('admin.index');  
// });

// Route::get('/admin/list', function () {
//     return view('admin.list');
// });
$var = Announcement::all();
Auth::routes();

Route::get('/', 'AdminController@index')->name('admin');
Route::get('/admin', 'AdminController@index')->name('admin');

// place
Route::get('/places', 'PlaceController@index')->name('get_places');
Route::post('/place', 'PlaceController@store')->name('store_place');
Route::get('/deletePlace/{id}', 'PlaceController@destroy')->name('delete_place');

// destination
Route::get('/destinations', 'DestinationController@index')->name('get_destinations');
Route::post('/destination', 'DestinationController@store')->name('create_destination');
Route::get('/deleteDestination/{id}', 'DestinationController@destroy')->name('delete_destination');


// coordinates
Route::get('/coordinates', 'DestinationCoordinatesController@index')->name('get_coordinates');


Route::post('/announcement', 'AdminController@createAnnouncement')->name('createAnnouncement');
Route::get('/announcement', 'AdminController@announcement')->name('announcement');
Route::get('/deleteAnnouncement/{id}', 'AdminController@deleteAnnouncement')->name('deleteAnnouncement');
Route::get('/editAnnouncement/{id}', 'AdminController@editAnnouncement')->name('editAnnouncement');
Route::post('/updateAnnouncement/{id}', 'AdminController@updateAnnouncement')->name('updateAnnouncement');

Route::get('/lost-and-found', 'AdminController@lost_and_found')->name('lost_and_found');
Route::post('/lost_and_found', 'LostAndFoundController@createLostAndFound')->name('createLostAndFound');
Route::get('/deleteLostAndFound/{id}', 'LostAndFoundController@deleteLostAndFound')->name('deleteLostAndFound');
Route::get('/editLostAndFound/{id}', 'LostAndFoundController@editLostAndFound')->name('editLostAndFound');
Route::post('/updateLostAndFound/{id}', 'LostAndFoundController@updateLostAndFound')->name('updateLostAndFound');


Route::get('/user', 'AdminController@index')->name('user');
Route::get('/node', 'AdminController@index')->name('node');


