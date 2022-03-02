<?php

Route::get('/',function (){
    return view('admin.index');
})->name('dashboard');

Route::group(['prefix'=>'products'],function (){
    Route::get('/','Admin\ProductsController@index')->name('admin.products');
    Route::get('/new','Admin\ProductsController@getNew')->name('admin.products.new');
    Route::post('/new','Admin\ProductsController@postNew')->name('admin.products.new.post');
    Route::group(['prefix'=>'edit'],function (){
        Route::get('/{id}','Admin\ProductsController@getEdit')->name('admin.products.edit');
        Route::post('/{id}','Admin\ProductsController@postEdit')->name('admin.products.edit.post');
    });
    Route::post('/delete','Admin\ProductsController@postDelete')->name('admin.products.delete.post');

});

Route::group(['prefix'=>'settings'],function (){
    Route::get('/','Admin\IndexController@settings')->name('admin.settings');
    Route::post('/','Admin\IndexController@postSettingSave')->name('admin.settings.post');
    Route::get('/pdf','Admin\IndexController@downloadPdf')->name('admin.settings.pdf.download');
});

Route::group(['prefix'=>'about-us'],function (){
    Route::get('/','Admin\IndexController@about')->name('admin.about');
    Route::post('/','Admin\IndexController@postAbout')->name('admin.about.post');
});

Route::group(['prefix'=>'profile'],function (){
    Route::get('/','Admin\IndexController@profile')->name('admin.profile');
    Route::post('/','Admin\IndexController@postProfile')->name('admin.profile.post');
    Route::post('/change-password','Admin\IndexController@postChangePassword')->name('admin.profile.change-password');
});
