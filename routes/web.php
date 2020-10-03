<?php 
Route::get('/','HomeController@index');
Route::resource('/student','StudentController');
Route::get('/student/show/{id}','StudentController@show');
Route::get('/studentView/{id}','StudentController@studentView');
Route::resource('/multiArray','MultiArrayController');
