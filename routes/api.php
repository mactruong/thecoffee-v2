<?php

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\products;
use App\Models\category;



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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
//     

// lấy dữ liệu
Route::get('user','userAPIController@index');

Route::get('user/{id}','userAPIController@getByID');

Route::post('create-user','userAPIController@store');
//Sửa
Route::put('update-user/{id}','userAPIController@update');
//Xóa
Route::delete('delete-user/{id}','userAPIController@destroy');


Route::get('category','categoryAPIController@index');
//
Route::get('category/{slug}','categoryAPIController@getByID');
// Tạo mới
Route::post('create-category','categoryAPIController@store');
//Sửa
Route::put('update-category/{slug}','categoryAPIController@update');
//Xóa
Route::delete('delete-category/{slug}','categoryAPIController@destroy');


Route::get('role','roleAPIController@index');
//
Route::get('role/{id}','roleAPIController@getByID');
// Tạo mới
Route::post('create-role','roleAPIController@store');
//Sửa
Route::put('update-role/{id}','roleAPIController@update');
//Xóa
Route::delete('delete-role/{id}','roleAPIController@destroy');



Route::get('products','productsAPIController@index');
//
Route::get('products/{id}','productsAPIController@getByID');
// Tạo mới
Route::post('create-products','productsAPIController@store');
//Sửa
Route::put('update-products/{id}','productsAPIController@update');
//Xóa
Route::delete('delete-products/{id}','productsAPIController@destroy');


Route::get('news','newsAPIController@index');
//
Route::get('news/{id}','newsAPIController@getByID');
// Tạo mới
Route::post('create-news','newsAPIController@store');
//Sửa
Route::put('update-news/{id}','newsAPIController@update');
//Xóa
Route::delete('delete-news/{id}','newsAPIController@destroy');



Route::get('admin','adminAPIController@index');
//
Route::get('admins/{id}','adminAPIController@getByID');
// Tạo mới
Route::post('create-admin','adminAPIController@store');
//Sửa
Route::put('update-admin/{id}','adminAPIController@update');
//Xóa
Route::delete('delete-admin/{id}','adminAPIController@destroy');

Route::get('frcategory/{id}','FrontendAPIController@category');

Route::get('order','orderAPIController@index');