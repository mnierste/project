<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ApipageController extends Controller{
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
     return view('/projects/omdb/index');
	}

  public function search(){

    // set post fields
    $fields = array();
    //apikey for omdb (free)
    $fields['apikey']='1c0b4f74';
    //omdb title search
    $fields['t'] = request('title');

    //omdb year search
    if( request('year') != ''){
      $fields['y'] = request('year');
    }

    //get parameters ready for curl
    $fields = http_build_query($fields, '', '&');

    //Curl
    $curlclient = new \GuzzleHttp\Client();
    $curlrequest = $curlclient->get('http://www.omdbapi.com/?'.$fields);
    $curlresponse = $curlrequest;
    $omdbinfo = JSON_decode($curlresponse->getBody());

    return view('/projects/omdb/indexHandleForm', [
      'response' => $omdbinfo
    ]);

	}
  public function add(){

     //Curl
     $curlclient = new \GuzzleHttp\Client();

     $curlrequest = $curlclient->request('POST', 'https://calldripproject.free.beeceptor.com/add', [
          'form_params' => [
              'title' => request('title'),
              'year' => request('year'),
              'plot' => request('plot')
          ]
      ]);
     $curlresponse = $curlrequest;
     $response = JSON_decode($curlresponse->getBody());

     return redirect('/apipage')->with('mssg', $response->status);
	}


}
