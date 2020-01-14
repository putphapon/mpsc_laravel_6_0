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

use App\Http\Controllers\Home;
use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminTitle;

//Home
Route::get('/', 'Home@Home');

//About
Route::get('/about', 'Home@About');
Route::get('/board', 'Home@AboutBoard');
Route::get('/objective', 'Home@AboutObjective');

//Database
Route::get('/database', 'Home@Database');

//Scholar
Route::get('/scholar', 'Home@Scholar');

//Manuscripts
Route::get('/manuscripts', 'Home@Manuscripts');
Route::get('/manuscripts-tag', 'Home@ManuscriptsTag');
Route::get('/manuscripts-content', 'Home@ManuscriptsContent');


//VDO
Route::get('/vdo', 'Home@Vdo');

//Events
Route::get('/events', 'Home@Events');

//Shop
Route::get('/shops', 'Home@Shops');

//Contact
Route::get('/contact', 'Home@Contact');



//Admin

//title
Route::resource('/admin/title', 'AdminTitle');

//Database
Route::resource('/admin/database', 'AdminDatabase');

//Scholar
Route::resource('/admin/scholar', 'AdminScholar');

//Manuscripts
Route::resource('/admin/manuscripts', 'AdminManuscripts');
Route::resource('/admin/manuscriptscategory', 'AdminManuscriptsCategory');
Route::resource('/admin/manuscriptsblog', 'AdminManuscriptsBlog');

//VDO
Route::resource('/admin/vdo', 'AdminVDO');

//Events
Route::resource('/admin/events', 'AdminEvents');

//Shop
Route::resource('/admin/shops', 'AdminShops');

//Contact
Route::resource('/admin/contact', 'AdminContact');
