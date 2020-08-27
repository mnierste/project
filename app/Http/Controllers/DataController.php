<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class DataController extends Controller{
	/*
	|--------------------------------------------------------------------------
	| Data Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling the project providing
	| dashboard info
	|
	|	INDEX
	|		** shows sales data for '19 and '20
	|--------------------------------------------------------------------------
	*/

	 public function index(){
     return view('/projects/dataproject');
	}




}
