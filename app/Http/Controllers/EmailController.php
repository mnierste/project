<?php

namespace App\Http\Controllers;

//use App\Mail\ContactFormMail; //use this if ssl

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;

//use Mailgun\Mailgun;

use App\Http\Controllers\Controller; //take this out once ssl
use App\ContactMax;

class EmailController extends Controller{
	/*
	|--------------------------------------------------------------------------
	| EmailController Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling the contact emaill
	|
	|--------------------------------------------------------------------------
	*/
  public function index(){
     return view('/contactme');
	}

  #store in db function right now but email soon
  public function send(){
    $data = request()->validate([
      'name'    =>  'required',
      'subject' => 'required',
      'email'   =>  'required|email',
      'message' =>  'required'
    ]);

		$message = new ContactMax();
		//input in form
		$message->name = request('name');
		$message->subject = request('subject');
		$message->email = request('email');
		$message->message = request('message');

		$message->save();

		return redirect('/contactme')->with('mssg', 'Message Sent! Thanks and have a wonderful day');

    //send email <- need ssl cert #(TODO: look into cloudflare heroku ssl for free ssl)
    //Mail::to('maxnierste@gmail.com')->send(new ContactFormMail());

  }
}
