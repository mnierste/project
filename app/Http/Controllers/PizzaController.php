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
	|	INDEX
	| pizzas
	|  **Allows one to create a pizza
	|
	| ORDERS
	|	pizzaorders
	|  **Allows one to see all orders
	|
	| SHOW(id)
	|	pizzashow
	|	 **Allows one to see individual pizza
	|  **Allows one to edit/update individual pizza
	|  **Allows one to inactiave individual pizza
	|  **Allows one to delete individual pizza
	|
	| CREATE
	| pizzacreate
	|  **Creates pizza in db
	|
	| STORE
	| pizzas
	|  **Saves pizza in db
	|
	| UPDATE
	| pizzas/id
	|  **Updates individual pizza in db
	|
	| INACTIVE(id)
	| pizzas
	|  **Inactivates in db pizza
	|
	| DESTROY(id)
	| pizzas
	|  **deletes record in dbpizza
	|--------------------------------------------------------------------------
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
		return view('/projects/pizza/pizzaorders', [
			'pizzas' => $pizzas,
			'inactivePizzas' =>$inactivePizzas,
		]);
  }

	public function show($id){
		$pizza = Pizza::findOrFail($id);

		$toppings = Array("Ham", "Pepperoni", "Italian Sausage",
		"Meatball", "Bacon", "Chicken", "Beef", "Pork", "Human", "Buffalo Chicken",
		"Mushrooms", "Spinach", "Onions", "Red Onions", "Olives", "Bell Peppers",
		"Jalapeno", "Banana Peppers", "Pineapple", "Sundried Tomatoes",
		"Roma Tomatoes", "Gouda", "Feta", "Riccota");

		return view('/projects/pizza/pizzashow', [
			'pizza' => $pizza, 'toppings' => $toppings
		]);
	}

	public function create(){

		$toppings = Array("Ham", "Pepperoni", "Italian Sausage",
		"Meatball", "Bacon", "Chicken", "Beef", "Pork", "Human", "Buffalo Chicken",
		"Mushrooms", "Spinach", "Onions", "Red Onions", "Olives", "Bell Peppers",
		"Jalapeno", "Banana Peppers", "Pineapple", "Sundried Tomatoes",
		"Roma Tomatoes", "Gouda", "Feta", "Riccota");

		return view('/projects/pizza/pizzacreate', ['toppings' => $toppings]);
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
