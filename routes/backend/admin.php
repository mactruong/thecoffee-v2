<?php 

// Route::get('admin',[
// 	'uses' => 'adminController@index',
// 	'as' => 'backend.admin'
// ]);

// Route::get('admin-create',[
// 	'uses' => 'adminController@create',
// 	'as' => 'backend.admin-create'
// ]);

// Route::get('admin-edit/{id}',[
// 	'uses' => 'adminController@edit',
// 	'as' => 'backend.admin-edit'
// ]);

// Route::get('admin-delete/{id}',[
// 	'uses' => 'adminController@destroy',
// 	'as' => 'backend.admin-delete'
// ]);


Route::get('/admin','adminController@index')
->middleware('isAcceptRole:manager')
->name('backend.admin');

Route::get('/admin-create','adminController@create')
->middleware('isAcceptRole:manager')
->name('backend.admin-create');

Route::get('/admin-edit/{id}','adminController@edit')
->middleware('isAcceptRole:manager')
->name('backend.admin-edit');

Route::get('/admin-delete/{id}','adminController@destroy')
->middleware('isAcceptRole:manager')
->name('backend.admin-delete');

Route::post('admin-create',[
	'uses' =>'adminController@store',
	'as' => 'backend.admin-create'
]);

Route::post('admin-edit/{id}',[
	'uses' =>'adminController@update',
	'as' => 'backend.admin-edit'
]);


Route::get('change-password/{id}',[
	'uses' => 'adminController@changePassword',
	'as' => 'backend.change-password'
]);

Route::post('change-password/{id}',[
	'uses' => 'adminController@updatePassword',
	'as' => 'backend.change-password'
]);

?>