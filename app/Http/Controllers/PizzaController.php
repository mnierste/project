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
     return view('/projects/pizzas');


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
		return view('/projects/pizzas', [
			'pizzas' => $pizzas,
			'inactivePizzas' =>$inactivePizzas,
		]);


 }

	public function show($id){
		$pizza = Pizza::findOrFail($id);
		return view('projects/pizzashow', [
			'pizza' => $pizza
		]);
	}


	public function create(){
		return view('/projects/pizzacreate');
	}

	public function store(){
		//use for contacts crud project
		$pizza = new Pizza();
		//input in form
		$pizza->name = request('name');
		$pizza->type = request('type');
		$pizza->base = request('base');
		$pizza->toppings = request('toppings');

		$pizza->save();

		return redirect('/pizzas')->with('mssg', 'Thank you for your order');
	}

	public function update($id){
 		$pizza = Pizza::findOrFail($id);
		$pizza->active = 0;
		$pizza->save();

		return redirect('/pizzas')->with('mssg', 'Thank you for inactivating your order');

	}

	//deletes records
	public function destroy($id){

		$pizza = Pizza::findOrFail($id);
		$pizza->delete();
		return view('/projects/pizzas');
	}
}
