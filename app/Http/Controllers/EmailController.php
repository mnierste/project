<?php

namespace App\Http\Controllers;

//use App\Mail\ContactFormMail; //use this once ssl issue solved
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;
//use Mailgun\Mailgun;

use App\Http\Controllers\Controller; //take this out once ssl issue resolved
use App\ContactMax;

class EmailController extends Controller{
	/*
	|--------------------------------------------------------------------------
	| EmailController Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling the contact form and email
	|
	|
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

    //save to database
    //use for contacts crud project
		$message = new ContactMax();
		//input in form
		$message->name = request('name');
		$message->subject = request('subject');
		$message->email = request('email');
		$message->message = request('message');

		$message->save();

		return redirect('/contactme')->with('mssg', 'Message Sent! Thanks and have a wonderful day');

    //send email <- need ssl cert #(look into cloudflare heroku ssl for free ssl)
    //Mail::to('maxnierste@gmail.com')->send(new ContactFormMail());


  }
}
