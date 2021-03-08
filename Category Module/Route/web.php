<?php

Route::get('/', function () {
    return redirect()->to('/home');
});

Auth::routes([
	'verify'   => true,	
]);

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/check', function(){
	echo 'Successfully Email Verified!';
})->name('home')->middleware('verified');


Route::get('/category',                 'Backend\CategoryController@index')->name('category');
Route::post('/create_category',         'Backend\CategoryController@store')->name('store.category');
Route::post('/update_category/{id}',    'Backend\CategoryController@update')->name('update.category');
Route::get('/delete_category/{id}',     'Backend\CategoryController@delete')->name('delete.category');
Route::get('/edit_category/{id}',       'Backend\CategoryController@edit');

