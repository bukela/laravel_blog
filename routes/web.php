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
// Route::get('/test', function () {
//     return App\Profile::find(1)->user;
// });
Auth::routes();



Route::group(['prefix' => 'admin', 'middleware' => 'auth'] , function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('post/create', 'PostsController@create')->name('post.create');
    Route::get('posts', 'PostsController@index')->name('posts');
    Route::get('posts/trashed', 'PostsController@trashed')->name('posts.trashed');
    Route::get('post/kill/{id}', 'PostsController@kill')->name('post.kill');
    Route::get('post/restore/{id}', 'PostsController@restore')->name('post.restore');
    Route::get('post/edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::post('post/update/{id}', 'PostsController@update')->name('post.update');
    Route::post('post/store', 'PostsController@store')->name('post.store');

    Route::get('category/create', 'CategoriesController@create')->name('category.create');
    Route::get('categories', 'CategoriesController@index')->name('categories');
    Route::get('post/delete/{id}', 'PostsController@destroy')->name('post.delete');
    Route::post('category/store', 'CategoriesController@store')->name('category.store');
    Route::get('category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
    Route::get('category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');
    Route::post('category/update/{id}', 'CategoriesController@update')->name('category.update');

    Route::get('tags', 'TagsController@index')->name('tags');
    Route::get('tag/edit/{id}', 'TagsController@edit')->name('tag.edit');
    Route::post('tag/update/{id}', 'TagsController@update')->name('tag.update');
    Route::get('tag/delete/{id}', 'TagsController@destroy')->name('tag.delete');
    Route::get('tag/create', 'TagsController@create')->name('tag.create');
    Route::post('tag/store', 'TagsController@store')->name('tag.store');

    Route::get('users', 'UsersController@index')->name('users'); 
    Route::get('user/create', 'UsersController@create')->name('user.create');
    Route::get('user/admin/{id}', 'UsersController@admin')->name('user.admin')->middleware('admin');
    Route::get('user/not-admin/{id}', 'UsersController@not_admin')->name('user.not.admin')->middleware('admin');
    Route::post('user/store', 'UsersController@store')->name('user.store');
    Route::get('user/delete/{id}', 'UsersController@destroy')->name('user.delete');

    Route::get('user/profile', 'ProfilesController@index')->name('user.profile');
    Route::post('user/profile/update', 'ProfilesController@update')->name('user.profile.update'); 
});