<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Contacts;

use Illuminate\Support\Facades\Auth;

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
		$user = Auth::user();
		
		$contacts = \App\Contacts::where('UserID', $user->userID)->get();

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

	public function createmultiple(){

	  $file = request('file');

	  // File Details
	  $filename = $file->getClientOriginalName();
	  $extension = $file->getClientOriginalExtension();
	  $tempPath = $file->getRealPath();
	  $fileSize = $file->getSize();
	  $mimeType = $file->getMimeType();

	  // Valid File Extensions
	  $valid_extension = array("csv");

	  // 2MB in Bytes
	  $maxFileSize = 2097152;

	  // Check file extension
	  if(in_array(strtolower($extension),$valid_extension)){

	    // Check file size
	    if($fileSize <= $maxFileSize){

			}
		}
		//get data
		$filedatas = file($tempPath);

		$data = array();

		//get headers in csv file
		$headers = array_shift($filedatas);
		//remove any \n or others
		$headers = trim(preg_replace('/\s\s+/', ' ', $headers));

		$headers = explode(",", $headers);

		//go through rest of data
		foreach ($filedatas as $filedata){
			//remove any \n or others
			$filedata = trim(preg_replace('/\s\s+/', ' ', $filedata));
			$data[] = array_combine ($headers , explode(",", $filedata) );

		}

		$data = JSON_encode($data);

		return view('/projects/contacts/contactsmultipleadd',[
			'file' => $file,
			'data' => $data,
			'headers' => $headers

		]);

	}

	public function addfile(){
		//match items on csv headers to correct headers
		$headers = array();
		$headers[request('oldfirstname')] = request('1');
		$headers[request('oldlastname')] = request('2');
		$headers[request('oldphone')] = request('3');
		$headers[request('oldemail')] = request('4');

		$keys = array();
		$keys[request('oldfirstname')] = request('oldfirstname');
		$keys[request('oldlastname')] = request('oldlastname');
		$keys[request('oldphone')] = request('oldphone');
		$keys[request('oldemail')] = request('oldemail');
		//contact info from csv
		$filedatas = JSON_decode(request('data'), TRUE);


		/* testing
		$deets = array();
		$deets['keys'] = $keys;
		$deets['headers'] =$headers;
		$deets['in'] = array();
		$deets['out'] = array();
		*/
		foreach ($filedatas as $data){
			//switch headers for contact csv info

			foreach($data as $key => $val){

				if(in_array($key, $keys)){
					//$deets['in'][]=$key." : ".$val;
				}else{
					//$deets['out'][]=$key." : ".$val;
					unset($data[$key]);
				}
			}

			$newdata =array_combine($headers , $data);

			$contact = \App\Contacts::where('Email', $newdata['Email'])->get();
			$userId = Auth::user()->userID;
			if($contact == "[]"){

				//add new contact
				$contact = new \App\Contacts();

				$contact->FirstName = $newdata['FirstName'];
				$contact->LastName = $newdata['LastName'];
				$contact->Email = $newdata['Email'];
				$contact->Phone = $newdata['Phone'];
				$contact->UserID = $userId;
				$contact->save();
			}else{
				//update contact
				$contact = \App\Contacts::where('Email', request('email'))->update([
					'FirstName' => request('firstname'),
					'LastName' => request('lastname'),
					'Email' => request('email'),
					'Phone' => request('phone'),
					'UserID' => $userId
				]);

			}

		}//end foreach

		return redirect('/contacts')->with('mssg', 'Contacts Added');

	}


	public function store(){


		$contact = \App\Contacts::where('Email', request('email'))->get();
		$userId = Auth::user()->userID;

		if($contact =="[]"){
			//no data
			$contact = new \App\Contacts();
			//input in form
			$contact->FirstName = request('firstname');
			$contact->LastName = request('lastname');
			$contact->Email = request('email');
			$contact->Phone = request('phone');
			$contact->UserID = $userId;
			$contact->save();

			return redirect('/contacts')->with('mssg', 'Contact Added');
		}else{

			return redirect('/contacts')->with('mssgdelete', 'Contact with that email already Exists');

		}

	}

	public function update($id){
		$userId = Auth::user()->userID;
		$contact = \App\Contacts::where('Id', $id)->update([
			'FirstName' => request('firstname'),
			'LastName' => request('lastname'),
			'Email' => request('email'),
			'Phone' => request('phone'),
			'UserId' => $userId
		]);

		//dd(request('toppings'));
		if($contact == 1){
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

	//deletes records
	public function deletemultiple(){

		$rows = request('MassIds');
		$rows = explode(",", $rows);

		foreach($rows as $row){
			$contact = \App\Contacts::where('Id', $row)->delete();

		}

		return redirect('/contacts')->with('mssgdelete', 'Contacts Removed');
	}


}
