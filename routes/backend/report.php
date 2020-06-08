<?php 

// Route::get('/report',[
// 	'uses' => 'reportController@index',
// 	'as' => 'backend.report'
// ]);

// Route::get('/report-day',[
// 	'uses' => 'reportController@reportDay',
// 	'as' => 'backend.report-day'
// ]);

// Route::get('/report-month',[
// 	'uses' => 'reportController@reportMonth',
// 	'as' => 'backend.report-month'
// ]);


Route::get('/report','reportController@index')
->middleware('isAcceptRole:manager')
->name('backend.report');

Route::get('/report-day','reportController@reportDay')
->middleware('isAcceptRole:manager')
->name('backend.report-day');

Route::get('/report-month','reportController@reportMonth')
->middleware('isAcceptRole:manager')
->name('backend.report-month');

Route::get('/report-day/search',[
	'uses' => 'reportController@reportSearch',
	'as' => 'backend.report-search'
]);

Route::get('/report-month/search',[
	'uses' => 'reportController@reportMonthSearch',
	'as' => 'backend.report-month-search'
]);

?>