<?php 

// Route::get('products',[
// 	'uses' => 'productsController@index',
// 	'as' => 'backend.products'
// ]);

// Route::get('products-search',[
// 	'uses' => 'productsController@search',
// 	'as' => 'backend.products-search'
// ]);

// Route::get('products-create',[
// 	'uses' => 'productsController@create',
// 	'as' => 'backend.products-create'
// ]);


// Route::get('products-edit/{id}',[
// 	'uses'=>'productsController@edit',
// 	'as'=>'backend.products-edit'
// ]);

// Route::get('products-delete/{id}',[
// 	'uses' => 'productsController@destroy',
// 	'as' => 'backend.products-delete'
// ]);

Route::post('products-create',[
	'uses'=>'productsController@store',
	'as'=>'backend.products-create'
]);

Route::post('products-edit/{id}',[
	'uses'=>'productsController@update',
	'as'=>'backend.products-edit'
]);


Route::get('/products','productsController@index')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.products');


Route::get('/products-create','productsController@create')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.products-create');


Route::get('/products-edit/{id}','productsController@edit')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.products-edit');


Route::get('/products-delete/{id}','productsController@destroy')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.products-delete');

?>

