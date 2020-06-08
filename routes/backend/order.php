<?php 

// Route::get('order',[
// 	'uses' => 'orderController@index',
// 	'as' => 'backend.order'
// ]);

// Route::get('order-uncomfirm',[
// 	'uses' => 'orderController@getListOrderUnconfirm',
// 	'as' => 'backend.order-uncomfirm'
// ]);

// Route::get('order-add-user',[
// 	'uses' => 'orderController@addUser',
// 	'as' => 'backend.order-add-user'
// ]);


Route::get('/order','orderController@index')
->middleware('isNotAcceptRole:manage_info')
->name('backend.order');


Route::get('/order-pending','orderController@getListOrderUnconfirm')
->middleware('isNotAcceptRole:manage_info')
->name('backend.order-pending');

Route::get('/order-add-user','orderController@addUser')
->middleware('isNotAcceptRole:manage_info')
->name('backend.order-add-user');


Route::get('order-detail/{id}',[
	'uses' => 'orderController@viewDetailOrder',
	'as' => 'backend.order-detail'
]);

Route::post('order-detail/{id}',[
	'uses' => 'orderController@comfirmOrder',
	'as' => 'backend.order-detail'
]);

Route::get('order-delete/{id}',[
	'uses' => 'orderController@destroy',
	'as' => 'backend.order-delete'
]);

Route::get('order-create/{s_id}',[
	'uses' => 'orderController@create',
	'as' => 'backend.order-create'
]);

Route::post('order-create/{s_id}',[
	'uses' => 'orderController@store',
	'as' => 'backend.order-create'
]);

Route::get('order-add-product/{s_id}',[
	'uses' => 'orderController@addProduct',
	'as' => 'backend.order-add-product'
]);

Route::get('order-products-search',[
	'uses' => 'orderController@searchProduct',
	'as' => 'backend.order-products-search'
]);

Route::get('add-order/{id}/{s_id}/{price}',[
	'uses'=> 'orderController@addOrder',
	'as' => 'backend.add-order'
]);

Route::get('remove-order/{id}/{s_id}',[
	'uses'=> 'orderController@removeOrder',
	'as' => 'backend.remove-order'
]);

Route::get('clear-order/{s_id}',[
	'uses'=> 'orderController@clearOrder',
	'as' => 'backend.clear-order'
]);

Route::get('update-order/{id?}/{quantity?}',[
	'uses'=> 'orderController@updateOrder',
	'as' => 'backend.update-order'
]);

Route::get('order-reciept/{s_id}',[
	'uses'=> 'orderController@reciept',
	'as' => 'backend.order-reciept'
]);

?>