<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

// Rotte per l'autenticazione (register, login, logout)
Auth::routes();

// Rotta per la homepage pubblica
Route::get('/', 'HomeController@home')->name('home');
// Rotta per la pagina del singolo ristorante
Route::get('/restaurants/{slug}', 'RestaurantController@show')->name('restaurant');
// Rotta per la pagina del carrello
Route::get('/checkout/{id}', 'RestaurantController@checkout')->name('checkout');

// Rotta per la pagina di avvenuto pagamento
Route::get('/payed', function () {
    return view('pages.guests.payed');
});





// Rotte protette da autenticazione
Route::middleware('auth')  
	->namespace('Admin')
	->name('admin.')
	->prefix('admin')
	->group(function(){

	// Rotta per la pagina specifica del ristorante dopo l'accesso
	Route::get('/', 'HomeController@home')->name('home');
	Route::get('/dishes/{id}', 'DishController@getRestaurantDishes')->name('dishes');
	Route::get('/dishes/create/{id}', 'DishController@create')->name('create');
	Route::post('/dishes/store/{id}', 'DishController@store')->name('store');
	Route::delete('/dishes/destroy/{id}', 'DishController@destroy')->name('destroy');
	Route::get('/dishes/edit/{id}', 'DishController@edit')->name('edit');
	Route::put('/dishes/update/{id}', 'DishController@update')->name('update');
	Route::get('/graph/{id}', 'HomeController@graph')->name('graph');
	Route::get('/statics/{id}', 'StaticController@statics')->name('statics');

});

