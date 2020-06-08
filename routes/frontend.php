<?php 

Route::get('/',[
	'uses' => 'FrontendController@getDataHome',
	'as' => 'home'
]);


Route::get('/category/{slug}',[
	'uses'=>'FrontendController@getCategory',
	'as'=>'category'

]);

Route::get('bai-viet/{slug}',[
	'uses'=>'FrontendController@getDetailNews',
	'as'=>'bai-viet'

]);

Route::get('blog',[
	'uses'=>'FrontendController@getListNews',
	'as'=>'blog'

]);

Route::get('/change-password/{id}',[
	'uses'=>'FrontendController@changePassword',
	'as'=>'change-password'

]);

Route::post('/change-password/{id}',[
	'uses'=>'FrontendController@updatePassword',
	'as'=>'change-password'
]);


Route::get('menu',[
	'uses'=>'FrontendController@getMenu',
	'as'=>'menu'

]);


//dang ki

Route::get('/registration',[
	'uses'=>'FrontendController@registration',
	'as'=>'registration'
]);

Route::post('/registration',[
	'uses'=>'FrontendController@postRegistration',
	'as'=>'registration'
]);



// login

Route::get('login',[
	'uses'=>'FrontendController@login',
	'as'=>'login'
]);

Route::post('login',[
	'uses'=>'FrontendController@postLogin',
	'as'=>'login'
]);

Route::get('logout',[
	'uses'=>'FrontendController@logout',
	'as'=>'logout'
]);

Route::get('product/{slug}',[
	'uses'=>'FrontendController@getDetailProduct',
	'as'=>'product'                                                                                                  
]);

Route::get('profile',[
	'uses'=> 'FrontendController@getProfile',
	'as' => 'profile'
]);


Route::get('order',[
	'uses'=> 'FrontendController@order',
	'as' => 'order'
]);
Route::post('order',[
	'uses'=> 'FrontendController@postOrder',
	'as' => 'order'
]);

Route::get('history-order',[
	'uses'=> 'FrontendController@getHistoryOrder',
	'as' => 'history-order'
]);

Route::get('/edit-profile/{id}',[
	'uses'=> 'FrontendController@editProfile',
	'as' => 'edit-profile'
]);

Route::post('/edit-profile/{id}',[
	'uses'=>'FrontendController@updateProfile',
	'as'=>'edit-profile'
]);

Route::get('/active-user/{id}',[
	'uses'=>'FrontendController@activeUser',
	'as'=>'avtive-user'
]);

Route::post('/active-user/{id}',[
	'uses'=>'FrontendController@postActiveUser',
	'as'=>'avtive-user'
]);


//gio hang

Route::get('add-cart/{id}',[
	'uses'=> 'FrontendController@addCart',
	'as' => 'add-cart'
]);


Route::get('view-cart',[
	'uses'=> 'FrontendController@getViewCart',
	'as' => 'view-cart'
]);

Route::get('remove/{id}',[
	'uses'=> 'FrontendController@removeCart',
	'as' => 'remove'
]);

Route::get('clear',[
	'uses'=> 'FrontendController@clearCart',
	'as' => 'clear'
]);

Route::get('update/{id?}/{quantity?}',[
	'uses'=> 'FrontendController@updateCart',
	'as' => 'update'
]);

Route::get('error',[
	'uses' => 'FrontendController@error',
	'as' => 'error'
]);

Route::get('customer-delete/{id}',[
	'uses' => 'userController@destroy',
	'as' => 'customer-delete'
]);

?>