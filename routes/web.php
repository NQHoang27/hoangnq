<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => ['check.team','locale','auth']], function () {
	Route::get('change-language/{language}', 'LanguageController@changeLanguage')->name('user.change-language');
	Route::get('/', function () {
		return view('admin.home.index');
	})->name('admin');

	require_once('user.php');
	require_once('team.php');
	require_once('project.php');
	Route::get('demo-pusher','LanguageController@getPusher')->name('demo');
	Route::get('fire-event','LanguageController@fireEvent1')->name('load');
	Route::post('fire-event','LanguageController@fireEvent')->name('load.post');
	Route::get('import-file', 'ExcelController@import')->name('import');
	Route::post('import-file', 'ExcelController@importExcel')->name('insert.users');
	Route::get('export-file', 'ExcelController@export')->name('export');
});
Auth::routes();
Route::get('/logout', function () {
	Auth::logout();
	return redirect()->back();
})->name('logout');
