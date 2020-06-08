<?php 

// Route::get('/about-us',[
// 	'uses' => 'aboutUsController@index',
// 	'as' => 'backend.about-us'
// ]);

// Route::get('about-us-edit/{id}',[
// 	'uses' => 'aboutUsController@edit',
// 	'as' => 'backend.about-us-edit'
// ]);

Route::get('/about-us','aboutUsController@index')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.about-us');

Route::get('/about-us-edit/{id}','aboutUsController@edit')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.about-us-edit');

Route::post('about-us-edit/{id}',[
	'uses' =>'aboutUsController@update',
	'as' => 'backend.about-us-edit'
]);


?>