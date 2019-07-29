<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::group(['middleware' => ['web']], function () {
	Route::get('Danh-sach-user', 'Api\UserController@index')->name('user.index');

// them moi user
	Route::get('them-tai-khoan', 'Api\UserController@create')->name('user.create');

// Thêm moi user
	Route::post('them-tai-khoan', 'Api\UserController@store')->name('user.store');

// Cập nhật thong tin user theo id
	Route::get('cap-nhat-tai-khoan/{id}', 'Api\UserController@edit')->name('user.edit');
	Route::put('cap-nhat-tai-khoan/{id}', 'Api\UserController@update')->name('user.update');

// Xóa user theo id
	Route::get('xoa-tai-khoan/{id}', 'Api\UserController@destroy')->name('user.destroy');
});
