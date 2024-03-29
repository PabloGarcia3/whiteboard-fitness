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

Route::get('/', "BlogsController@index");

Auth::routes();

Route::get('/blogs', "BlogsController@index")->name('blogs');
Route::get('/blogs/create', "BlogsController@create")->name('blogs.create');
Route::post('/blogs/store', "BlogsController@store")->name('blogs.store');

// Keep trashed routes here
// Route::get('/blogs/trash', 'BlogsController@trash')->name('blogs.trash');
// Route::get('/blogs/{id}/restore', 'BlogsController@restore')->name('blogs.restore');
// Route::delete('/blogs/{id}/permanent-delete', "BlogsController@permanentDelete")->name('blogs.permanent-delete');

Route::get('/blogs/{id}', "BlogsController@show")->name('blogs.show');
Route::get('/blogs/{id}/edit', "BlogsController@edit")->name('blogs.edit');
Route::patch('/blogs/{id}/update', "BlogsController@update")->name('blogs.update');
Route::delete('/blogs/{id}/delete', "BlogsController@delete")->name('blogs.delete');

Route::get('/home', 'HomeController@index')->name('home');

// Admin routes
Route::get('/dashboard', 'AdminController@index')->name('dashboard');

// Route Resource
Route::resource('categories', 'CategoryController');
Route::resource('users', 'UserController');

// Laravel File Manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    '\vendor\uniSharp\LaravelFilemanager\Lfm::routes()';
});