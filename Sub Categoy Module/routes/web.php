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


Route::get('/subcategory',             'Backend\SubcategoryController@index')->name('subcategory');
Route::post('/create_subcategory',     'Backend\SubcategoryController@store')->name('store.subcategory');
Route::post('/update_subcategory/{id}','Backend\SubcategoryController@update')->name('update.subcategory');
Route::get('/delete_subcategory/{id}', 'Backend\SubcategoryController@delete')->name('delete.subcategory');
Route::get('/edit_subcategory/{id}',   'Backend\SubcategoryController@edit');

