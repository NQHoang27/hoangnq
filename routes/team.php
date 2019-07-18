<?php 

Route::get('team','TeamController@index')->name('team');
Route::get('them-team','TeamController@add')->name('them-team');
Route::post('them-team','TeamController@store')->name('them-team');
Route::get('sua-team/{id}','TeamController@edit')->name('sua-team');
Route::put('sua-team/{id}','TeamController@update')->name('team.update');
Route::get('xoa-team/{id}','TeamController@destroy')->name('xoa-team');
?>