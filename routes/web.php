<?php

Route::get('/login','Auth\LoginController@showLoginForm');
Route::post('/login','Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@logout');

Route::get('/register','Auth\RegisterController@showRegistrationForm');
Route::post('/register','Auth\RegisterController@register');


Route::get('/', 'IndexController@index');
Route::get('/article/{slug}', 'IndexController@show')->name('article.show');
Route::get('/tag/{slug}', 'IndexController@tag')->name('tag.show');
Route::get('/category/{slug}', 'IndexController@category')->name('category.show');


Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=> 'admin'], function(){
    Route::get('/', 'MainController@index');
    Route::resource('/tags', 'TagsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/uploads', 'UploadsController');
    Route::resource('/articles', 'ArticlesController');
    Route::resource('/categories', 'CategoriesController');
    Route::get('/comments', 'CommentsController@index');
    Route::get('/comments/toggle/{id}', 'CommentsController@toggle');
    Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comments.destroy');
});

Route::group(['middleware'	=>	'auth'], function(){
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store');
    Route::post('/comment', 'CommentsController@store');
});

Auth::routes();




