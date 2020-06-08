<?php 

// Route::get('/role',[
// 	'uses' => 'roleController@index',
// 	'as' => 'backend.role'
// ]);

// Route::get('/role-create',[
// 	'uses' => 'roleController@create',
// 	'as' => 'backend.role-create'
// ]);

// Route::get('role-edit/{id}',[
// 	'uses' => 'roleController@edit',
// 	'as' => 'backend.role-edit'
// ]);

// Route::get('role-delete/{id}',[
// 	'uses' => 'roleController@destroy',
// 	'as' => 'backend.role-delete'
// ]);


Route::get('/role','roleController@index')
->middleware('isAcceptRole:manager')
->name('backend.role');

Route::get('/role-create','roleController@create')
->middleware('isAcceptRole:manager')
->name('backend.role-create');

Route::get('/role-edit/{id}','roleController@edit')
->middleware('isAcceptRole:manager')
->name('backend.role-edit');

Route::get('/role-delete/{id}','roleController@destroy')
->middleware('isAcceptRole:manager')
->name('backend.role-delete');

Route::post('role-create',[
	'uses' =>'roleController@store',
	'as' => 'backend.role-create'
]);

Route::post('role-edit/{id}',[
	'uses' =>'roleController@update',
	'as' => 'backend.role-edit'
]);


?>