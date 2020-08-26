<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Pizza;


class PizzaController extends Controller{
	/*
	|--------------------------------------------------------------------------
	| PizzaController
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling baisc CRUD app for a pizza place
	|
	|
	*/
	/* USE THIS to protect all routes in this controller instead of
		->middleware(auth) in routes/web.php

	 public function __construct(){

		 $this->middleware(auth);

	 }
	*/
	 public function index(){

     //get parameter example (use for geocode)
     return view('/projects/pizza/pizzas');

	}

	public function orders(){
		//get all
		#$pizzas = Pizza::all();

		//orders result by name
		#$pizzas = Pizza::orderBy('name', 'desc')->get();

		//where col == val
		$pizzas = Pizza::where('active', '1')->get();
		$inactivePizzas = Pizza::where('active', 0)->get();

		//latest if timestamp
		#$pizzas = Pizza::latest()->get();

		//get parameter example (use for geocode)
		return view('/projects/pizzaorders', [
			'pizzas' => $pizzas,
			'inactivePizzas' =>$inactivePizzas,
		]);
  }

	public function show($id){
		$pizza = Pizza::findOrFail($id);

		$toppings = Array("Ham", "Pepperoni", "Italian Sausage",
		"Meatball", "Bacon", "Chicken", "Beef", "Pork", "Human", "Buffalo Chicken",
		"Mushrooms", "Spinach", "Onions", "Red Onions", "Olives", "Bell Peppers", "Jalapeno",
		"Banana Peppers", "Pineapple", "Sundried Tomatoes", "Roma Tomatoes",
		"Gouda", "Feta", "Riccota");

		return view('/projects/pizza/pizzashow', [
			'pizza' => $pizza, 'toppings' => $toppings
		]);
	}

	public function create(){

		$toppings = Array("Ham", "Pepperoni", "Italian Sausage",
		"Meatball", "Bacon", "Chicken", "Beef", "Pork", "Human", "Buffalo Chicken",
		"Mushrooms", "Spinach", "Onions", "Red Onions", "Olives", "Bell Peppers", "Jalapeno",
		"Banana Peppers", "Pineapple", "Sundried Tomatoes", "Roma Tomatoes",
		"Gouda", "Feta", "Riccota");

		return view('/projects/pizzacreate', ['toppings' => $toppings]);
	}

	public function store(){
		//use for contacts crud project
		$pizza = new Pizza();
		//input in form
		$pizza->firstname = request('firstname');
		$pizza->lastname = request('lastname');
		$pizza->crust = request('crust');
		$pizza->sauce = request('sauce');
		$pizza->cheese = request('cheese');
		$pizza->toppings =request('toppings');

		$pizza->save();

		return redirect('/pizzas')->with('mssg', 'Thank you for your order');
	}

	public function update($id){

		$pizza = Pizza::where('id', $id)->update([
			'firstname' => request('firstname'),
			'lastname' => request('lastname'),
			'crust' => request('crust'),
			'sauce' => request('sauce'),
			'cheese' => request('cheese'),
			'toppings' => request('toppings')
		]);

		//dd(request('toppings'));

		if($pizza ==1){
			return redirect('/pizzas/'.$id)->with('mssg', 'Thank you for updating your order');

		}else{
			return redirect('/pizzas/'.$id)->with('mssg', 'Error updating');

		}

	}

	public function inactive($id){
 		$pizza = Pizza::findOrFail($id);
		$pizza->active = 0;
		$pizza->save();

		return redirect('/pizzas')->with('mssg', 'Thank you for inactivating your order');

	}

	//deletes records
	public function destroy($id){

		$pizza = Pizza::findOrFail($id);
		$pizza->delete();
		return view('/projects/pizza/pizzas');
	}
}
