<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// get data sample
Route::get('/get_data', 'AdminController@getData')->name('getData');

// get annoucements
Route::get('/announcements', 'AdminController@announcements')->name('announcements');

// get lost and found
Route::get('/lost_and_found_list', 'AdminController@lost_and_found_list')->name('lost_and_found_list');

// get upload announcement
Route::post('/upload_announcement', 'AdminController@upload_announcement')->name('upload_announcement');

// get upload_laf
Route::post('/upload_laf', 'AdminController@upload_laf')->name('upload_laf');

// get destinations
Route::get('/get_places', 'PlaceController@get_places')->name('get_places');
Route::get('/get_destinations', 'DestinationController@get_destinations')->name('get_destinations');
Route::get('/get_destination/{id}', 'DestinationController@get_destination_by_id')->name('get_destination_by_id');
Route::get('/get_destination_from_place/{id}', 'DestinationController@get_destination_where_place_from_is_id')->name('get_destination_from_place');


// destination coordinates
Route::post('/submit_coordinates', 'DestinationCoordinates@get_places')->name('get_places');
