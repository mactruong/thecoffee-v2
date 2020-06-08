<?php 

// Route::get('user',[
// 	'uses' => 'userController@index',
// 	'as' => 'backend.user'
// ]);

Route::get('user','userController@index')
->middleware('isNotAcceptRole:manage_info')
->name('backend.user');

Route::get('user-create',[
	'uses' => 'userController@create',
	'as' => 'backend.user-create'
]);

Route::post('user-create',[
	'uses' =>'userController@store',
	'as' => 'backend.user-create'
]);

Route::get('user-edit/{id}',[
	'uses' => 'userController@edit',
	'as' => 'backend.user-edit'
]);

Route::post('user-edit/{id}',[
	'uses' =>'userController@update',
	'as' => 'backend.user-edit'
]);

Route::get('user-delete/{id}',[
	'uses' => 'userController@destroy',
	'as' => 'backend.user-delete'
]);

?>