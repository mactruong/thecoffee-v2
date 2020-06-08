<?php 

// Route::get('/banner',[
// 	'uses' => 'bannerController@index',
// 	'as' => 'backend.banner'
// ]);

// Route::get('/banner-create',[
// 	'uses' => 'bannerController@create',
// 	'as' => 'backend.banner-create'
// ]);

// Route::post('banner-create',[
// 	'uses' =>'bannerController@store',
// 	'as' => 'backend.banner-create'
// ]);

// Route::get('banner-edit/{id}',[
// 	'uses' => 'bannerController@edit',
// 	'as' => 'backend.banner-edit'
// ]);

Route::post('banner-edit/{id}',[
	'uses' =>'bannerController@update',
	'as' => 'backend.banner-edit'
]);

Route::get('/banner','bannerController@index')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.banner');

Route::get('/banner-edit/{id}','bannerController@edit')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.banner-edit');

?>