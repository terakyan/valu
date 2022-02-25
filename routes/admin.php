<?php

Route::get('/',function (){
    return view('admin.index');
})->name('dashboard');

Route::group(['prefix'=>'settings'],function (){
    Route::get('/','SettingsController@index')->name('admin.settings');

    Route::get('/add-new-country','SettingsController@newCountry')->name('admin.settings.add_country');
    Route::post('/add-new-country','SettingsController@postNewCountry');

    Route::get('/edit-country/{id}','SettingsController@editCountry')->name('admin.settings.edit_country');
    Route::post('/edit-country/{id}','SettingsController@postNewCountry');
    Route::post('/delete-country/{id}','SettingsController@deleteCountry')->name('admin.settings.delete_country');

    Route::get('/add-new-language','SettingsController@newLanguage')->name('admin.settings.add_language');
    Route::post('/add-new-language','SettingsController@createLanguage');
    Route::post('/delete-language/{id}','SettingsController@deleteLanguage')->name('admin.settings.delete_language');

    Route::get('/edit-language/{id}','SettingsController@editLanguage')->name('admin.settings.edit_language');
    Route::post('/edit-language/{id}','SettingsController@postEditLanguage');
});
