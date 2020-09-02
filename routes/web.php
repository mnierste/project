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

//---- Auth routes and dashboard ------------------------------------------
Auth::routes([
  //make register as a false route
  'register'=>false
]);
//---- dashboard ----------------------------------------------------------
Route::get('/home', 'HomeController@index')->name('home');

//---- welcome page -------------------------------------------------------
Route::get('/', function () {
    return view('welcome');
});

//---- about page ----------------------------------------------------------
Route::get('/about', function () {
    return view('about');
});

//---- projects page -------------------------------------------------------
Route::get('/projects', function () {
    return view('/projects/projects');
});

//---- contactme page ------------------------------------------------------
Route::get('/contactme', 'EmailController@index');
Route::post('/contactme', 'EmailController@send');

//---- Pizza Project (crud App routes) -------------------------------------
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
//delete individual pizza
Route::delete('/pizzas/{id}', 'PizzaController@destroy')->middleware('auth');

//---- food finder project -------------------------------------------------
Route::get('/foodfinder', 'FoodController@index');
Route::get('/foodfindershow', 'FoodController@show');

//---- Sales data dashboard project ----------------------------------------
Route::get('/dataproject', 'DataController@index');

//---- Vue examples --------------------------------------------------------
Route::get('/demos/tasks','DemoController@showTasks');

//---- Landing page example ------------------------------------------------
Route::get('/landingpage', function () {
    return view('/projects/landingpage');
});

//---- Contacts crud -------------------------------------------------------
//show all contacts
Route::get('/contacts', 'ContactController@index')->middleware('auth');
//add contact
Route::get('/contacts/addcontact', 'ContactController@create')->middleware('auth');
//save contact
Route::post('/contacts', 'ContactController@store');
//see individual contact
Route::get('/contacts/{id}', 'ContactController@show')->middleware('auth');
//edit individual contact
Route::post('/contacts/{id}', 'ContactController@update')->middleware('auth');
//delete individual contact
Route::delete('/contacts/{id}', 'ContactController@destroy')->middleware('auth');




/*
|--------------------------------------------------------------------------
| other projects in progress
|--------------------------------------------------------------------------
*/

//---- email sending (welcome email when registered) -----------------------
Route::get('email', function(){
  return new WelcomeMail();
});

// refers to the url (database-test) ---------------------------------------
Route::get('database-test', function () {
    if(DB::connection()->getDatabaseName() ){
    	echo 'Connected successfully to database ' . DB::connection()->getDatabaseName();
    }
});
