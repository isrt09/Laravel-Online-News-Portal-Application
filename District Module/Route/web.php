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

Route::get('/subcategory',             'Backend\SubcategoryController@index')->name('subcategory');
Route::post('/create_subcategory',     'Backend\SubcategoryController@store')->name('store.subcategory');
Route::post('/update_subcategory/{id}','Backend\SubcategoryController@update')->name('update.subcategory');
Route::get('/delete_subcategory/{id}', 'Backend\SubcategoryController@delete')->name('delete.subcategory');
Route::get('/edit_subcategory/{id}',   'Backend\SubcategoryController@edit');

Route::get('/district',                 'Backend\DistrictController@index')->name('district');
Route::post('/create_district',         'Backend\DistrictController@store')->name('store.district');
Route::get('/delete_district/{id}',     'Backend\DistrictController@delete')->name('delete.district');
Route::get('/edit_district/{id}',       'Backend\DistrictController@edit')->name('edit.district');
Route::post('/update_district/{id}',    'Backend\DistrictController@update')->name('update.district');

Route::get('/subdistricts',             'Backend\SubdistrictController@index')->name('subdistrict');
Route::post('/create_subdistrict',      'Backend\SubdistrictController@store')->name('store.subdistrict');
Route::get('/delete_subdistrict/{id}',  'Backend\SubdistrictController@delete')->name('delete.subdistrict');
Route::get('/edit_subdistrict/{id}',    'Backend\SubdistrictController@edit')->name('edit.subdistrict');
Route::post('/update_subdistrict/{id}', 'Backend\SubdistrictController@update')->name('update.subdistrict');

Route::get('/posts',             'Backend\PostController@index')->name('post');
Route::get('/create_post',       'Backend\PostController@create')->name('insert.post');


// JSON Data 
Route::get('get/subcategory/{category_id}','Backend\PostController@getSubcategory');
Route::get('get/subdistrict/{district_id}','Backend\PostController@getSubdisctrict');

Route::get('/all_post',                    'Backend\PostController@index')  ->name('all.post');
Route::post('/create_post',                'Backend\PostController@store')  ->name('store.post');
Route::get('/delete_post/{id}',            'Backend\PostController@destroy')->name('delete.post');
Route::get('/edit_post/{id}',              'Backend\PostController@edit')   ->name('edit.post');
Route::post('/update_post/{id}',           'Backend\PostController@update') ->name('update.post');


Route::get('/all_photos',                  'Backend\GalleryController@photos')    ->name('photos.gallery');
Route::post('/create_photos',              'Backend\GalleryController@storePhotos')->name('store.photos');
Route::get('/delete_photos/{id}',          'Backend\GalleryController@deletePhotos')->name('delete.photos');