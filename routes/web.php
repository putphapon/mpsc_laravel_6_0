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


//Home
Route::get('/', 'Home@Home');

//About
Route::resource('/about', 'HomeAbout');
Route::resource('/objective', 'HomeAboutObjective');
Route::resource('/board', 'HomeAboutBoard');

//Database
Route::resource('/database', 'HomeDatabase');

//Scholar
Route::resource('/scholar', 'HomeScholar');

//Manuscripts
Route::resource('/manuscripts', 'HomeManuscripts');
Route::resource('/manuscriptscategory', 'HomeManuscriptsCategory');
Route::resource('/manuscriptsblog', 'HomeManuscriptsBlog');

//VDO
Route::resource('/vdo', 'HomeVdo');

//Events
Route::resource('/events', 'HomeEvents');

//Shop
Route::resource('/shops', 'HomeShops');

//Contact
Route::resource('/contact', 'HomeContact');



//Admin
//title
Route::resource('/admin/title', 'AdminTitle');

//about
Route::resource('/admin/about', 'AdminAbout');

//Database
Route::resource('/admin/database', 'AdminDatabase');

//Scholar
Route::resource('/admin/scholar', 'AdminScholar');
Route::resource('/admin/scholarcategory', 'AdminScholarCategory');
Route::resource('/admin/scholarblog', 'AdminScholarBlog');

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

Auth::routes();

Route::get('admin', 'HomeController@index')->name('home');
