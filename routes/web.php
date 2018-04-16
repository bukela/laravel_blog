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

Auth::routes();



Route::group(['prefix' => 'admin', 'middleware' => 'auth'] , function() {
    Route::get('post/create', 'PostsController@create')->name('post.create');
    Route::get('posts', 'PostsController@index')->name('posts');
    Route::get('posts/trashed', 'PostsController@trashed')->name('posts.trashed');
    Route::get('post/kill/{id}', 'PostsController@kill')->name('post.kill');
    Route::get('post/restore/{id}', 'PostsController@restore')->name('post.restore');
    Route::get('post/edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::post('post/update/{id}', 'PostsController@update')->name('post.update');
    Route::get('category/create', 'CategoriesController@create')->name('category.create');
    Route::get('categories', 'CategoriesController@index')->name('categories');
    Route::post('post/store', 'PostsController@store')->name('post.store');
    Route::get('post/delete/{id}', 'PostsController@destroy')->name('post.delete');
    Route::post('category/store', 'CategoriesController@store')->name('category.store');
    Route::get('category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
    Route::get('category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');
    Route::post('category/update/{id}', 'CategoriesController@update')->name('category.update');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('tags', 'TagsController@index')->name('tags');
    Route::get('tag/edit/{id}', 'TagsController@edit')->name('tag.edit');
    Route::post('tag/update/{id}', 'TagsController@update')->name('tag.update');
    Route::get('tag/delete/{id}', 'TagsController@destroy')->name('tag.delete');
    Route::get('tag/create', 'TagsController@create')->name('tag.create');
    Route::post('tag/store', 'TagsController@store')->name('tag.store');
});