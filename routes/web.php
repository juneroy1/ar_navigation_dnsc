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

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/announcement', 'AdminController@announcement')->name('announcement');
Route::get('/lost-and-found', 'AdminController@lost_and_found')->name('lost_and_found');
Route::get('/user', 'AdminController@index')->name('admin');
Route::get('/node', 'AdminController@index')->name('admin');


