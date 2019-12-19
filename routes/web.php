<?php
use Illuminate\Http\Request;
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
Route::get('/coba', function () {
    return view('coba');
});
Auth::routes();
Route::get('/list','ListEventController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/buat','BuatEventController@index');
Route::post('/add','BuatEventController@store')->name('add');
Route::get('/detail/{id}','DetailController@index');
Route::get('/myevent','MyEventController@index');
Route::post('/addorder','OrderController@store')->name('addorder');
Route::get('/order/{id}','OrderController@index');
Route::get('/order/{id}/cetak_pdf','OrderController@cetak_pdf');
Route::get('/eventku/{id}','EventkuController@index');
Route::get('/myevent/delete/{id}','MyEventController@delete');
Route::get('/myevent/edit/{id}','MyEventController@edit');
Route::post('/update','MyEventController@update')->name('update');