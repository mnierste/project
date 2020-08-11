<?php

use Illuminate\Support\Facades\Route;
use App\Mail\WelcomeMail;
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
\
//---------------------------------------------------------//

//welcome page
Route::get('/', function () {
    return view('welcome');
});

//---------------------------------------------------------//

//about page
Route::get('/about', function () {
    return view('about');
});


//---------------------------------------------------------//

//contactme page
Route::get('/contactme', 'EmailController@index');
Route::post('/contactme', 'EmailController@send');


//---------------------------------------------------------//

//projects page
Route::get('/projects', function () {
    return view('/projects/projects');
});

//----------------------------------------------//
//Pizza Project (crud App routes)
//routes in order of priority
//main page
Route::get('/pizzas', 'PizzaController@index');
//order pizza
Route::get('/pizzas/create', 'PizzaController@create');
//see orders
Route::get('/pizzaorders', 'PizzaController@orders')->middleware('auth');
//save pizza
Route::post('/pizzas', 'PizzaController@store');
//show individual pizza
Route::get('/pizzas/{id}', 'PizzaController@show')->middleware('auth');
//edit individual pizza
Route::post('/pizzas/{id}', 'PizzaController@update')->middleware('auth');
//inactive individual pizza
Route::put('/pizzas/{id}', 'PizzaController@inactive')->middleware('auth');
//delete pizza
Route::delete('/pizzas/{id}', 'PizzaController@destroy')->middleware('auth');

//END Pizza project

//---------------------------------------------------------//

//geocode location project
Route::get('/geocode', 'GeocodeController@index');
Route::get('/geocodeshow', 'GeocodeController@show');
#Route::post('/geocode', 'GeocodeController@store');


//---------------------------------------------------------//

//food finder project trader_cdl3starsinsouth
Route::get('/foodfinder', 'FoodController@index');
Route::get('/foodfindershow', 'FoodController@show');
// food finder project end


//---------------------------------------------------------//



// refers to the url /database-test
Route::get('database-test', function () {
    if(DB::connection()->getDatabaseName() ){
    	echo 'Connected successfully to database ' . DB::connection()->getDatabaseName();
    }

});


Route::get('contacts', 'ContactController@index')->middleware('auth');
Route::get('email', function(){
  return new WelcomeMail();
});

Auth::routes([
  //make register as a false route
  'register'=>false
]);

Route::get('/home', 'HomeController@index')->name('home');
