<?php 

// Route::get('news',[
// 	'uses' => 'newsController@index',
// 	'as' => 'backend.news'
// ]);

// Route::get('news-create',[
// 	'uses' => 'newsController@create',
// 	'as' => 'backend.news-create'
// ]);



// Route::get('news-edit/{id}',[
// 	'uses' => 'newsController@edit',
// 	'as' => 'backend.news-edit'
// ]);


// Route::get('news-delete/{id}',[
// 	'uses' => 'newsController@destroy',
// 	'as' => 'backend.news-delete'
// ]);



Route::get('/news','newsController@index')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.news');

Route::get('/news-create','newsController@create')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.news-create');

Route::get('/news-edit/{id}','newsController@edit')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.news-edit');

Route::get('/news-delete/{id}','newsController@destroy')
->middleware('isNotAcceptRole:manage_sale')
->name('backend.news-delete');

Route::post('news-create',[
	'uses' =>'newsController@store',
	'as' => 'backend.news-create'
]);

Route::post('news-edit/{id}',[
	'uses' =>'newsController@update',
	'as' => 'backend.news-edit'
]);

?>