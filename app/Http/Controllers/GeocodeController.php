<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class GeocodeController extends Controller{

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


		 $weather_url="https://api.openweathermap.org/data/2.5/onecall?lat=".$address['Long']."&lon=".$address['Lat']."&units=imperial&appid=5244737e695977e5bd196caa2cfd0872";

		 $weatherclient = new \GuzzleHttp\Client();
		 $weatherrequest = $weatherclient->get($weather_url);
		 $weatherresponse = $weatherrequest;

		 //end weather request

		 //start melissa tax Info
		 $id= 'LxtIEuHCujSoyubpUVTIZl**nSAcwXpxhQ0PC2lXxuDAZ-**';

		 $melissa_url = "https://property.melissadata.net/v4/WEB/LookupProperty?id=".$id."&t=Test&format=JSON&cols=&account=&addresskey=&a1=".$address['street']."&a2=&apn=&city=".$address['city']."&country=&fips=&ff=&mak=&state=".$address['state']."&postal=".$address['zip'];
		 $melissaresponse = '[{"Address":"5625 N Burlington Dr","City":"McCordsville","State":"IN","Zip":"46055-9493","MAK":"1474748564","BaseMAK":"","AddressKey":"46055949325","Latitude":"39.86462","Longitude":"-85.92869","FormattedAPN":"","County":"Hancock","FIPSCode":"18059","CensusTract":"410900","CensusBlock":"3006","OwnerAddress":"5625 N Burlington Dr","OwnerCity":"McCordsville","OwnerState":"IN","OwnerZip":"46055-9493","OwnerMAK":"1474748564","OwnerType":"NP","OwnerName1Full":"MAX J NIERSTE","OwnerName2Full":"","EstimatedValue":154000.0,"YearAssessed":"2019","AssessedValueTotal":130900.0,"AssessedValueLand":33800.0,"AssessedValueImprovements":97100.0,"TaxBilledAmount":1107.08,"YearBuilt":"2001","ZonedCodeLocal":"","AreaBuilding":2035.0,"Area1stFloor":0.0,"Area2ndFloor":0.0,"AreaLotAcres":0.1410,"AreaLotSF":6142.00,"ParkingGarageArea":380.0,"BedroomsCount":"3","BathCount":"2","Results":"YS02,YS07,YC01,GS05"}]';
/*
		 $melissaclient = new \GuzzleHttp\Client();
		 $melissarequest = $melissaclient->get($melissa_url);
		 $melissaresponse = $melissarequest;
*/
     //get parameter example (use for geocode)
     return view('/projects/geocodeshow', [
       'address' => $address,
			 'response' => $data,
			 'weather'=> $weatherresponse,
			 'melissa'=> $melissaresponse

		 ]);
	}


	public function create(){
		return view('/projects/pizzacreate');
	}

	public function store(){
		//use for contacts crud project
		$pizza = new Pizza();
		//input in form
		$pizza->name = request('name');
		$pizza->type = request('type');
		$pizza->base = request('base');
		$pizza->toppings = request('toppings');

		$pizza->save();

		return redirect('/pizzas')->with('mssg', 'Thank you for your order');
	}

	public function update($id){
 		$pizza = Pizza::findOrFail($id);
		$pizza->active = 0;
		$pizza->save();

		return redirect('/pizzas')->with('mssg', 'Thank you for inactivating your order');

	}

	//deletes records
	public function destroy($id){

		$pizza = Pizza::findOrFail($id);
		$pizza->delete();
		return view('/projects/pizzas');
	}
}
