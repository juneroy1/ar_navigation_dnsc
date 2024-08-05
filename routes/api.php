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
Route::get('/get_data', 'AdminController@getData')->name('getData');
Route::get('/announcements', 'AdminController@announcements')->name('announcements');
Route::get('/lost_and_found_list', 'AdminController@lost_and_found_list')->name('lost_and_found_list');
Route::post('/upload_announcement', 'AdminController@upload_announcement')->name('upload_announcement');
