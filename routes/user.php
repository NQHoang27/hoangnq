<?php 

Route::get('tai-khoan','UserController@index')->name('tai-khoan');
Route::get('them-tai-khoan','UserController@add')->name('them-tai-khoan');
Route::post('them-tai-khoan','UserController@store')->name('them-tai-khoan');
Route::get('sua-tai-khoan/{id}','UserController@edit')->name('sua-tai-khoan');
Route::put('sua-tai-khoan/{id}','UserController@update')->name('tai-khoan.update');
Route::get('xoa-tai-khoan/{id}','UserController@destroy')->name('xoa-tai-khoan');
?>