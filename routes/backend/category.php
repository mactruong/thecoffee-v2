<?php 

// Route::get('/category',[
// 	'uses' => 'categoryController@index',
// 	'as' => 'backend.category'
// ]);

// Route::get('/category-create',[
// 	'uses' => 'categoryController@create',
// 	'as' => 'backend.category-create'
// ]);


// Route::get('category-edit/{slug}',[
// 	'uses' => 'categoryController@edit',
// 	'as' => 'backend.category-edit'
// ]);

// Route::get('category-delete/{slug}',[
// 	'uses' => 'categoryController@destroy',
// 	'as' => 'backend.category-delete'
// ]);


Route::get('/category','categoryController@index')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.category');


Route::get('/category-create','categoryController@create')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.category-create');


Route::post('category-create',[
	'uses' =>'categoryController@store',
	'as' => 'backend.category-create'
]);

Route::get('/category-edit/{slug}','categoryController@edit')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.category-edit');


Route::post('category-edit/{slug}',[
	'uses' =>'categoryController@update',
	'as' => 'backend.category-edit'
]);

Route::get('/category-delete/{slug}','categoryController@destroy')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.category-delete');


?>