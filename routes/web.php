<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//welcome page
Route::get('/', function () {
    return view('welcome');
});

//about page
Route::get('/about', function () {
    return view('about');
});

//contactme page
Route::get('/contactme', function () {
    return view('contactme');
});

//projects page
Route::get('/projects', function () {
    return view('/projects/projects');
});


//Pizza Project (crud App routes)
//routes in order of priority
Route::get('/pizzas', 'PizzaController@index');
Route::get('/pizzas/create', 'PizzaController@create');
Route::post('/pizzas', 'PizzaController@store');
Route::get('/pizzas/{id}', 'PizzaController@show');
Route::put('/pizzas/{id}', 'PizzaController@update');
Route::delete('/pizzas/{id}', 'PizzaController@destroy');

//END Pizza project


//geocode location project
Route::get('/geocode', 'GeocodeController@index');
Route::get('/geocodeshow', 'GeocodeController@show');
#Route::post('/geocode', 'GeocodeController@store');

//food finder project trader_cdl3starsinsouth
Route::get('/foodfinder', 'FoodController@index');
Route::get('/foodfindershow', 'FoodController@show');
// food finder project end



// refers to the url /database-test
Route::get('database-test', function () {
    if(DB::connection()->getDatabaseName() ){
    	echo 'Connected successfully to database ' . DB::connection()->getDatabaseName();
    }

});


Route::get('contacts', 'ContactController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
