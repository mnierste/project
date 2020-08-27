<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ContactController extends Controller{

	/*
	|--------------------------------------------------------------------------
	| Contacts Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling contacts.
	|--------------------------------------------------------------------------
	*/

	function index(){

		$contacts = \App\Contacts::all();

		return view('projects/contacts/index', ['all_contacts' => $contacts]);
	}
}
