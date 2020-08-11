<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class FoodController extends Controller{
	/*
	|--------------------------------------------------------------------------
	| FoodController Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling the project for finding
	| places to eat near you.
	|
	|	INDEX
	|
	| SHOW
	|  **takes address from index page
	|  **uses geocode api for lat and long2ip
	|	 **uses Zomato api for list of places to eat
	*/

	 public function index(){


     //get parameter example (use for geocode)
     return view('/projects/foodfinder');


	}

	public function show(){

		//------ start geo lat long http request

		 $address = [];
		 $address['street']= request('street');
		 //$address['city'] = request('city');
		 //$address['state'] = request('state');
		 $address['zip'] = request('zip');

		 $data = [];

     foreach($address as $key => $val){
         #$value = $conn -> real_escape_string($val);

         $data[]= $key."=".$val;
     }
		 $data = implode("&", $data);

		 #https://geocoding.geo.census.gov/geocoder/locations/address?".$data."&benchmark=Public_AR_Census2010&format=json";

		 $geocodeclient = new \GuzzleHttp\Client();
	 	 $geocoderequest = $geocodeclient->get('https://geocoding.geo.census.gov/geocoder/locations/address?'.$data.'&benchmark=Public_AR_Census2010&format=json');
	   $geocoderesponse = $geocoderequest;

		 $geocodeinfo = JSON_decode($geocoderesponse->getBody(), true);

		 // ----- END geocode

		 /// ---- start zomato request

		 //lat long added to address array from geo code
		 $address['Lat'] = $geocodeinfo['result']['addressMatches']['0']['coordinates']['y'];
	   $address['Long'] = $geocodeinfo['result']['addressMatches']['0']['coordinates']['x'];

		 //api key
		 //$zomato_id = env(ZOMATO_API);
		 $zomato_id = '310279ba8b666c1de79b745382936363';
		 //url
		 $zomato_url="https://developers.zomato.com/api/v2.1/geocode?lat=".$address['Lat']."&lon=".$address['Long'];

		 //guzzle for request in laravel
		 $zomatoclient = new \GuzzleHttp\Client(['headers' => ['user-key' => $zomato_id]]);
		 $zomatorequest = $zomatoclient->get($zomato_url);
		 $zomatoresponse = $zomatorequest;

		 //end Zomato request



     //get parameter example (use for geocode)
     return view('/projects/foodfindershow', [
       'address' => $address,
			 'zomato' => $zomatoresponse
		 ]);
	}




}
