<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class GeocodeController extends Controller{


	/*
	|--------------------------------------------------------------------------
	| Geocode Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for the small geocode porject for basic tax
	|info about entered address and weather / 7 day forcast for the location.
	|
	*/

	 public function index(){


     //get parameter example (use for geocode)
     return view('/projects/geocode');


	}

	public function show(){

		//------ start geo lat long http request

		 $address = [];
		 $address['street']= request('street');
		 $address['city'] = request('city');
		 $address['state'] = request('state');
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

		 /// ---- start weather http request
		 $address['Lat'] = $geocodeinfo['result']['addressMatches']['0']['coordinates']['x'];
	   $address['Long'] = $geocodeinfo['result']['addressMatches']['0']['coordinates']['y'];

		 //url for curl
		 $weather_url="https://api.openweathermap.org/data/2.5/onecall?lat=".$address['Long']."&lon=".$address['Lat']."&units=imperial&appid=5244737e695977e5bd196caa2cfd0872";

		 $weatherclient = new \GuzzleHttp\Client();
		 $weatherrequest = $weatherclient->get($weather_url);
		 $weatherresponse = $weatherrequest;

		 //end weather request


     //return info and view
     return view('/projects/geocodeshow', [
       'address' => $address,
			 'response' => $data,
			 'weather'=> $weatherresponse
		 ]);
	}

}
