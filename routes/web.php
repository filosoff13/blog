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

Route::get('/', function () {
    return view('welcome');
});

Route::get('news', 'Pagination@users');

Route::get('/test', function() {
  if (DB::connection()->getDatabaseName())  {
    dd('Conected!');
  } else {
    return 'Conection false';
  }});
/** Articles*/
Route::get('news/create', 'Pagination@create');

Route::get('news/show/{id}', 'Pagination@show');

Route::get('news/edit/{id}', 'Pagination@edit');

Route::delete('news/delete', 'Pagination@delete')->name('artDel');

Route::get('news/store', 'Pagination@store');

//$router->resource('post', 'Pagination');

/** Categories*/
Route::get('categories', 'Categories@index');

Route::get('categories/add', 'Categories@add');

Route::get('categories/edit/{id}', 'Categories@edit');

Route::delete('categories/delete', 'Categories@delete')->name('catDet');
