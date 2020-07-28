<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ContactController extends Controller{

	//power the contact page
	function index(){
		$contacts = \App\Contacts::all();
		
		/*
		echo '<pre>';
		print_r($contacts);
		echo '</pre>';
		*/

		return view('contacts.index', ['all_contacts' => $contacts]);
	}
}
