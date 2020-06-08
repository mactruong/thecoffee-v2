<?php 

Route::get('backend',[
	'uses' => 'Admin\AuthController@login',
	'as' => 'admin.login'
]);

Route::post('backend',[
	'uses' => 'Admin\AuthController@postLogin',
	'as' => 'admin.login'
]);

Route::get('backend/logout',[
	'uses' => 'Admin\AuthController@logout',
	'as' => 'admin.logout'
]);

?>