<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Contacts;
class ContactController extends Controller{

	/*
	|--------------------------------------------------------------------------
	| Contacts Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling contacts.
	|
	| INDEX
	| contacts/index
	|	 **Shows ALL contacts
	|  **Allows one to add contact
	|	 **Allows one to go to edit contact
	|  **Allows one to delete contact
	|
	|
	|--------------------------------------------------------------------------
	*/

	function index(){

		$contacts = \App\Contacts::where('active', '1')->get();

		return view('projects/contacts/index', ['all_contacts' => $contacts]);
	}

	public function show($id){
		$contact = \App\Contacts::findOrFail($id);

		return view('/projects/contacts/contactshow', [
			'contact' => $contact
		]);
	}

	public function create(){

		return view('/projects/contacts/contactsadd');
	}

	public function store(){
		//use for contacts crud project
		$contact = new \App\Contacts();
		//input in form
		$contact->FirstName = request('firstname');
		$contact->LastName = request('lastname');
		$contact->Email = request('email');
		$contact->Phone = request('phone');

		$contact->save();

		return redirect('/contacts')->with('mssg', 'Contact Added');
	}

	public function update($id){

		$contact = \App\Contacts::where('Id', $id)->update([
			'FirstName' => request('firstname'),
			'LastName' => request('lastname'),
			'Email' => request('email'),
			'Phone' => request('phone')

		]);

		//dd(request('toppings'));
		if($contact ==1){
			return redirect('/contacts/'.$id)->with('mssg', 'Thank you for updating the information');

		}else{
			return redirect('/contacts/'.$id)->with('mssg', 'There was an error updating, Please try again');
		}
	}

	//deletes records
	public function destroy($id){

		$contact = \App\Contacts::where('Id', $id)->delete();

		return redirect('/contacts')->with('mssgdelete', 'Contact Removed');
	}

}
