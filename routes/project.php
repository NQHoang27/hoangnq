<?php 

Route::get('project','ProjectController@index')->name('project');
Route::get('them-project','ProjectController@add')->name('them-project');
Route::post('them-project','ProjectController@store')->name('them-project');
Route::get('sua-project/{id}','ProjectController@edit')->name('sua-project');
Route::put('sua-project/{id}','ProjectController@update')->name('project.update');
Route::get('xoa-project/{id}','ProjectController@destroy')->name('xoa-project');
?>