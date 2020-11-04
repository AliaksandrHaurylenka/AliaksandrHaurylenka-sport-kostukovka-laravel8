<?php

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');


    Route::resource('photo_image_pages', 'Admin\PhotoImagePageController');
    Route::post('photo_image_pages_mass_destroy', ['uses' => 'Admin\PhotoImagePageController@massDestroy', 'as' => 'photo_image_pages.mass_destroy']);
    Route::post('photo_image_pages_restore/{id}', ['uses' => 'Admin\PhotoImagePageController@restore', 'as' => 'photo_image_pages.restore']);
    Route::delete('photo_image_pages_perma_del/{id}', ['uses' => 'Admin\PhotoImagePageController@perma_del', 'as' => 'photo_image_pages.perma_del']);




});
