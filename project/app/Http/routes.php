
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@index');
Route::get('/contact', 'PagesController@contact');
Route::get('/test', 'GamesController@test');
Route::get('shop/paid', 'ProductsController@paid');
Route::get('/shop/product/{id}', 'ProductsController@show');
Route::get('/shop/payment_failed', 'ProductsController@payment_failed');
Route::get('/overview_games', 'PagesController@overview_games');
Route::get('/info_game/{id}', 'PagesController@info_game');

Route::resource('/shop', 'ProductsController');

Route::resource('admin/orders', 'OrdersController');
Route::resource('admin/games', 'GamesController');
Route::delete('admin/games/{id}/destroy', 'GamesController@destroy'); // to work with ajax

//User
Route::get('/user/show/{id}', 'UsersController@show');

//Pdf
//Route::resource('/invoices/{id}', 'InvoiceController');
Route::get('/invoices/{id}','InvoicesController@show');
//Route::get('/invoices', 'InvoicesController@invoice');

//Test
//Route::resource('/testgiant', 'PagesController@test');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');

Route::controllers([
    'password' => 'Auth\PasswordController',
]);