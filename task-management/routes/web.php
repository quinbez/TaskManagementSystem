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
    return view('welcome');
});
Route::get('/dashboard', function() {
    return view('dashboard.index');
});
Route::get('/member/search', 'App\Http\Controllers\AdminMembersController@search')->name('search');
Route::get('/member/create', 'App\Http\Controllers\AdminMembersController@create')->name('create');
Route::post('/member', 'App\Http\Controllers\AdminMembersController@store')->name('store');
Route::get('/member/index', 'App\Http\Controllers\AdminMembersController@index')->name('index');
Route::get('/member/edit', 'App\Http\Controllers\AdminMembersController@update')->name('update');


Route::get('/project/create', 'App\Http\Controllers\AdminProjectsController@create')->name('createproj');
Route::post('/project', 'App\Http\Controllers\AdminProjectsController@store')->name('storeproj');
Route::get('/project/index', 'App\Http\Controllers\AdminProjectsController@index')->name('indexproj');


Route::get('/task/create', 'App\Http\Controllers\AdminTasksController@create')->name('tasks');
Route::post('/task', 'App\Http\Controllers\AdminTasksController@store')->name('storetask');
Route::get('/task/index', 'App\Http\Controllers\AdminTasksController@index')->name('indextask');

Route::get('/category/create', 'App\Http\Controllers\AdminCategoriesController@create')->name('categories');
Route::post('/category', 'App\Http\Controllers\AdminCategoriesController@store')->name('storecategory');
Route::get('/category/index', 'App\Http\Controllers\AdminCategoriesController@index')->name('indexcategory');

Route::get('/dashboard', 'App\Http\Controllers\AdminDashboardsController@index')->name('dashboards');



Route::get('/login', 'App\Http\Controllers\HomeController@index')->name('login');
// Route::get('/member/edit', function() {
//  return view('member.edit');
// });
