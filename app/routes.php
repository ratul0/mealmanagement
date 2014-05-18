<?php

// for guest only
Route::group(array('before' => 'guest'), function()
{

	Route::get('login', array('as' => 'login', 'uses' => 'UserController@login'));
	Route::post('login', array('uses' => 'UserController@doLogin'));
	Route::get('register', array('as' => 'register', 'uses' => 'UserController@register'));
	Route::post('register', array('uses' => 'UserController@doRegister'));
});

// for any logged in user
Route::group(array('before' => 'auth'), function()
{
	Route::get('home', array('as' => 'home', 'uses' => 'UserController@home'));
	Route::get('cridential',['as'=>'user.update','uses' => 'UserController@edit']);
	Route::put('cridential',['uses' => 'UserController@update']);
	Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logout'));
});

// for user
Route::group(array('before' => 'auth|user'), function()
{
	
});

// for manager
Route::group(array('before' => 'auth|manager'), function()
{
	
});


// for admin
Route::group(array('before' => 'auth|admin'), function()
{
	
	Route::get('payments',['as'=>"payment.index" , 'uses' => "PaymentController@index"]);
	Route::get('payment/edit/{id}',['as'=>"payment.edit" , 'uses' => "PaymentController@edit"]);
	Route::PUT('payment/edit/{id}',[ 'uses' => "PaymentController@update"]);

	Route::get('bazars',['as'=>"bazar.index" , 'uses' => "BazarController@index"]);
	Route::get('bazar/edit/{id}',['as'=>"bazar.edit" , 'uses' => "BazarController@edit"]);
	Route::PUT('bazar/edit/{id}',[ 'uses' => "BazarController@update"]);
	Route::get('bazar/add/{id}',['as'=>"bazar.add" , 'uses' => "BazarController@add"]);
	Route::get('bazar/sub/{id}',['as'=>"bazar.sub" , 'uses' => "BazarController@sub"]);

	Route::get('meals',['as'=>"meal.index" , 'uses' => "MealController@index"]);
	Route::get('meal/add/{id}',['as'=>"meal.add" , 'uses' => "MealController@add"]);
	Route::get('meal/sub/{id}',['as'=>"meal.sub" , 'uses' => "MealController@sub"]);
	Route::get('meal/add',['as'=>"meal.add.all" , 'uses' => "MealController@addAll"]);
	Route::get('meal/sub',['as'=>"meal.sub.all" , 'uses' => "MealController@subAll"]);

});



// public pages [ keep them at last]
Route::get('/', array('as' => 'guest', 'uses' => 'UserController@guest'));